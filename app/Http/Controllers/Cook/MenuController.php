<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('ingredients')->get();
        return view('cook.menu.index', compact('menus'));
    }

    public function create()
    {
        return view('cook.menu.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'ingredients' => 'required|array',
            'ingredients.*.item_id' => 'required|exists:inventory,id',
            'ingredients.*.quantity' => 'required|numeric|min:0'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu-images', 'public');
            $validated['image'] = $imagePath;
        }

        $menu = Menu::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? null
        ]);

        foreach ($validated['ingredients'] as $ingredient) {
            $menu->ingredients()->create([
                'inventory_item_id' => $ingredient['item_id'],
                'quantity_required' => $ingredient['quantity']
            ]);
        }

        return redirect()->route('cook.menu.index')->with('success', 'Menu item created successfully');
    }

    public function edit(Menu $menu)
    {
        $menu->load('ingredients');
        return view('cook.menu.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'ingredients' => 'required|array',
            'ingredients.*.item_id' => 'required|exists:inventory,id',
            'ingredients.*.quantity' => 'required|numeric|min:0'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($menu->image) {
                \Storage::disk('public')->delete($menu->image);
            }
            $imagePath = $request->file('image')->store('menu-images', 'public');
            $validated['image'] = $imagePath;
        }

        $menu->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'image' => $validated['image'] ?? $menu->image
        ]);

        // Update ingredients
        $menu->ingredients()->delete();
        foreach ($validated['ingredients'] as $ingredient) {
            $menu->ingredients()->create([
                'inventory_item_id' => $ingredient['item_id'],
                'quantity_required' => $ingredient['quantity']
            ]);
        }

        return redirect()->route('cook.menu.index')->with('success', 'Menu item updated successfully');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->image) {
            \Storage::disk('public')->delete($menu->image);
        }
        $menu->ingredients()->delete();
        $menu->delete();
        return redirect()->route('cook.menu.index')->with('success', 'Menu item deleted successfully');
    }

    public function toggleAvailability(Menu $menu)
    {
        $menu->update(['is_available' => !$menu->is_available]);
        return redirect()->route('cook.menu.index')->with('success', 'Menu availability updated');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManagedUser;

class ManagedUserController extends Controller
{

    public function view()
    {
        $users = ManagedUser::all();
        return view('admin.adminUserM', compact('users'));
    }
    
    public function index()
    {
        $users = ManagedUser::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        ManagedUser::create($request->all());
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = ManagedUser::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = ManagedUser::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = ManagedUser::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}

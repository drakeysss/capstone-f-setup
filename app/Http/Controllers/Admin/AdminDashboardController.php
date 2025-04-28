<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the suppliers page.
     *
     * @return \Illuminate\View\View
     */
    public function suppliers()
    {
        return view('admin.suppliers');
    }

    /**
     * Show the reports page.
     *
     * @return \Illuminate\View\View
     */
    public function reports()
    {
        return view('admin.reports');
    }

    /**
     * Show the notifications page.
     *
     * @return \Illuminate\View\View
     */
    public function notifications()
    {
        return view('admin.notifications');
    }

    /**
     * Show the settings page.
     *
     * @return \Illuminate\View\View
     */
    public function settings()
    {
        return view('admin.settings');
    }

    /**
     * Show the users management page.
     *
     * @return \Illuminate\View\View
     */
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the create user form.
     *
     * @return \Illuminate\View\View
     */
    public function createUser()
    {
        return view('admin.users.create');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,student,cook'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    /**
     * Show the edit user form.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'string', 'in:admin,student,cook'],
        ]);

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    /**
     * Delete a user.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    /**
     * Show the analytics page.
     *
     * @return \Illuminate\View\View
     */
    public function analytics()
    {
        return view('admin.analytics');
    }

    /**
     * Show the system logs page.
     *
     * @return \Illuminate\View\View
     */
    public function logs()
    {
        return view('admin.logs');
    }

    /**
     * Update system settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSettings(Request $request)
    {
        // Add your settings update logic here
        return redirect()->route('admin.settings')->with('success', 'Settings updated successfully.');
    }
}
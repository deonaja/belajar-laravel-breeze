<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate(['role' => 'required']);

        $user->syncRoles($request->role);

        return redirect()->route('users.index')->with('success', 'User role updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'User deleted!');
    }
}

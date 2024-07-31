<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //permission check
        if (! has_permission('admin user menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $users = User::where('role', 'admin')->whereNot('email', 'admin@admin.com')->with(['roles'])->paginate(10);

        return view('admin.layouts.adminUser.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('admin user create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $roles = Role::whereNot('name', 'Super Admin')->get();

        return view('admin.layouts.adminUser.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('admin user create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        //permission check
        if (! has_permission('role create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'selectedRoles' => 'nullable|array',
            'selectedRoles.*' => 'exists:roles,name',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => bcrypt($request->password),
            'email_verified_at' => now(),
        ]);
        $user->assignRole($request->selectedRoles);
        flash()->addSuccess('User created successfully.');

        return redirect()->route('admin.admin-user.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //permission check
        if (! has_permission('admin user edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $user = User::with(['roles'])->findOrFail($id);
        $existingRole = $user->roles->pluck('name')->toArray();
        $roles = Role::whereNot('name', 'Super Admin')->get();

        return view('admin.layouts.adminUser.edit', compact('user', 'existingRole', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //permission check
        if (! has_permission('admin user edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|min:6|confirmed',
            'selectedRoles' => 'nullable|array',
            'selectedRoles.*' => 'exists:roles,name',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => 'admin',
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
        $user->syncRoles($request->selectedRoles);
        flash()->addSuccess('User created successfully.');

        return redirect()->route('admin.admin-user.index');
    }
}

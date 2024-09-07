<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //permission check
        if (! has_permission('role menu')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $roles = Role::when($request->search, function ($query, $value) {
            $query->where('name', 'like', '%'.$value.'%');
        })->whereNot('name', 'Super Admin')->with('permissions')->paginate(20);

        return view('admin.layouts.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //permission check
        if (! has_permission('role create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $permissionGroup = Permission::all()->groupBy('group_name')->map(function ($permissions, $groupName) {
            return [
                'group_name' => $groupName,
                'permissions' => $permissions,
            ];
        });

        return view('admin.layouts.role.create', compact('permissionGroup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //permission check
        if (! has_permission('role create')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        //validate request
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'required|array|exists:permissions,name',
        ]);

        //create role
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);

        //assign permissions to role
        $role->givePermissionTo($request->permissions);
        flash()->addSuccess('Role created successfully');

        return redirect()->route('admin.role.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //permission check
        if (! has_permission('role edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $role = Role::with('permissions')->findOrFail($id);
        if (empty($role)) {
            abort(404);
        }
        $permissionGroup = Permission::all()->groupBy('group_name')->map(function ($permissions, $groupName) {
            return [
                'group_name' => $groupName,
                'permissions' => $permissions,
            ];
        });

        $existingPermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.layouts.role.edit', compact('permissionGroup', 'role', 'existingPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //permission check
        if (! has_permission('role edit')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        //validate request
        $request->validate([
            'name' => 'required|string|unique:roles,name,'.$id,
            'permissions' => 'required|array|exists:permissions,name',
        ]);

        //create role
        $role = Role::findById($id);

        //assign permissions to role
        $role->syncPermissions($request->permissions);
        flash()->addSuccess('Role updated successfully');

        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //permission check
        if (! has_permission('role delete')) {
            abort('403', 'Permission denied: You do not have permission access this page');
        }
        $role = Role::findById($id);
        $role->delete();
        flash()->addSuccess('Role deleted successfully');

        return redirect()->route('admin.role.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::query()->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create($data);

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name'  => 'required|unique:roles,name',
        ]);

        $role->update($data);

        return redirect()->route('admin.roles.index');
    }

    public function assignPermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission))
        {
            return back()->with('message', 'Permission existed');
        }

        $role->givePermissionTo($request->permission);

        return back()->with('message', 'Permission assigned');
    }

    public function removePermission(Role $role, Permission $permission)
    {
        if($role->hasPermissionTo($permission))
        {
            $role->revokePermissionTo($permission);
            return back()->with('message', 'Permission revoked');
        }

        return back()->with('message', 'Permission not existed');

    }
}

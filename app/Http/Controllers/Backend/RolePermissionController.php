<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function Index()
    {
        $roles = Role::all();
        return view('admin.pages.rolePermission.rolePermission_all', compact('roles'));
    } // End Method

    public function Create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.pages.rolePermission.rolePermission_create', compact('roles', 'permissions', 'permission_groups'));
    } // End Method

    public function Store(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        }

        $notification = array(
            'message' => 'Role permission created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.role-permission.index')->with($notification);
    } // End Method

    public function Edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.pages.rolePermission.rolePermission_edit', compact('role', 'permissions', 'permission_groups'));
    } // End Method

    public function Update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message' => 'Role permission updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.role-permission.index')->with($notification);
    } // End Method

    public function Destroy($id)
    {
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role permission deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

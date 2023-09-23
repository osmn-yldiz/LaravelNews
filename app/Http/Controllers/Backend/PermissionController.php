<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function Index()
    {
        $permissions = Permission::all();
        return view('admin.pages.permission.permission_all', compact('permissions'));
    } // End Method

    public function Create()
    {
        return view('admin.pages.permission.permission_create');
    } // End Method

    public function Store(Request $request)
    {
        $role = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.permission.index')->with($notification);
    } // End Method

    public function Edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.pages.permission.permission_edit', compact('permission'));
    } // End Method

    public function Update(Request $request, $id)
    {
        $permissionId = Permission::findOrFail($id);

        $permissionId->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.permission.index')->with($notification);
    } // End Method

    public function Destroy($id)
    {
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

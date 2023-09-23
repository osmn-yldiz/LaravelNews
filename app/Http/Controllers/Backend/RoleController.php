<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function Index()
    {
        $roles = Role::all();
        return view('admin.pages.roles.roles_all', compact('roles'));
    } // End Method

    public function Create()
    {
        return view('admin.pages.roles.roles_create');
    } // End Method

    public function Store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.role.index')->with($notification);
    } // End Method

    public function Edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.pages.roles.roles_edit', compact('role'));
    } // End Method

    public function Update(Request $request, $id)
    {
        $roleId = Role::findOrFail($id);

        $roleId->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.role.index')->with($notification);
    } // End Method

    public function Destroy($id)
    {
        Role::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Role deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

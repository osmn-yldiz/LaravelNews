<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function Index()
    {
        $allAdmin = User::where('role', 'admin')->latest()->get();
        return view('admin.admin_user.all_admin', compact('allAdmin'));
    } // End Method

    public function Create()
    {
        $roles = Role::all();
        return view('admin.admin_user.create_admin', compact('roles'));
    } // End Method

    public function Store(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New admin user created successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.user.index')->with($notification);
    } // End Method

    public function Edit($id)
    {
        $roles = Role::all();
        $adminuser = User::findOrFail($id);
        return view('admin.admin_user.edit_admin', compact('adminuser', 'roles'));
    } // End Method

    public function Update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = 'admin';
        $user->status = 'inactive';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin user updated successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.user.index')->with($notification);
    } // End Method

    public function Destroy($id)
    {
        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Admin user deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function Inactive($id)
    {
        User::findOrFail($id)->update([
            'status' => 'inactive',
        ]);

        $notification = array(
            'message' => 'Admin user inactive!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function Active($id)
    {
        User::findOrFail($id)->update([
            'status' => 'active',
        ]);

        $notification = array(
            'message' => 'Admin user active!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

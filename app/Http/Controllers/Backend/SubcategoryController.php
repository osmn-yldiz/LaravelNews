<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function SubcategoryAll()
    {
        $subcategories = Subcategory::latest()->get();
        return view('admin.subcategory.subcategory_all', compact('subcategories'));
    } // End Method

    public function SubcategoryCreate()
    {
        $categories = Category::latest()->get();
        return view('admin.subcategory.subcategory_create', compact('categories'));
    } // End Method

    public function SubcategoryStore(Request $request)
    {
        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => strtoupper($request->subcategory_name),
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'Subcategory created successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.subcategory.index')->with($notification);
    } // End Method

    public function SubcategoryEdit($id)
    {
        $categories = Category::latest()->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('admin.subcategory.subcategory_edit', compact('categories', 'subcategory'));
    } // End Method

    public function SubcategoryUpdate($id, Request $request)
    {
        $subcategory = Subcategory::findOrFail($id);

        $subcategory->update([
            'category_id' => $request->category_id,
            'subcategory_name' => strtoupper($request->subcategory_name),
            'subcategory_slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        ]);

        $notification = array(
            'message' => 'Subcategory updated successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.subcategory.index')->with($notification);
    } // End Method

    public function SubcategoryDestroy($id)
    {
        Subcategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Subcategory deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function GetSubCategory($category_id)
    {
        $subcategory = Subcategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcategory);
    } // End Method
}

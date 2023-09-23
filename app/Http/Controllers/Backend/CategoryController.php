<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
        $categories = Category::latest()->get();
        return view('admin.category.category_all', compact('categories'));
    } // End Method

    public function CategoryCreate()
    {
        return view('admin.category.category_create');
    } // End Method

    public function CategoryStore(Request $request)
    {
        Category::insert([
            'category_name' => strtoupper($request->category_name),
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Category created successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.category.index')->with($notification);
    } // End Method

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit', compact('category'));
    } // End Method

    public function CategoryUpdate($id, Request $request)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'category_name' => strtoupper($request->category_name),
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
        ]);

        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.category.index')->with($notification);
    } // End Method

    public function CategoryDestroy($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    } // End Method
}

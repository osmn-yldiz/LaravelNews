<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class NewsPostController extends Controller
{
    public function Index()
    {
        $allNews = NewsPost::latest()->get();
        return view('admin.news.all_newsPost', compact('allNews'));
    } // End Method

    public function Create()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $adminuser = User::where('role', 'admin')->latest()->get();
        return view('admin.news.newsPost_create', compact('categories', 'subcategories', 'adminuser'));
    } // End Method

    public function Store(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/news/' . $name_gen);
        $save_url = 'upload/news/' . $name_gen;

        NewsPost::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'user_id' => $request->user_id,
            'news_title' => $request->news_title,
            'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),

            'news_details' => $request->news_details,
            'tags' => $request->tags,

            'breaking_news' => $request->breaking_news,
            'top_slider' => $request->top_slider,
            'first_section_three' => $request->first_section_three,
            'first_section_nine' => $request->first_section_nine,

            'post_date' => date('d-m-Y'),
            'post_month' => date('F'),
            'image' => $save_url,

            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'News post created successfully!',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.newsPost.index')->with($notification);
    } // End Method

    public function Edit($id)
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $adminuser = User::where('role', 'admin')->latest()->get();
        $newspost = NewsPost::findOrFail($id);
        return view('admin.news.newsPost_edit', compact('categories', 'subcategories', 'adminuser', 'newspost'));
    } // End Method

    public function Update($id, Request $request)
    {

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('upload/news/' . $name_gen);
            $save_url = 'upload/news/' . $name_gen;

            NewsPost::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),

                'news_details' => $request->news_details,
                'tags' => $request->tags,

                'breaking_news' => $request->breaking_news,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,

                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'News post updated with image successfully!',
                'alert-type' => 'success',
            );

            return redirect()->route('admin.newsPost.index')->with($notification);
        } else {
            NewsPost::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'user_id' => $request->user_id,
                'news_title' => $request->news_title,
                'news_title_slug' => strtolower(str_replace(' ', '-', $request->news_title)),

                'news_details' => $request->news_details,
                'tags' => $request->tags,

                'breaking_news' => $request->breaking_news,
                'top_slider' => $request->top_slider,
                'first_section_three' => $request->first_section_three,
                'first_section_nine' => $request->first_section_nine,

                'post_date' => date('d-m-Y'),
                'post_month' => date('F'),
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'News post updated without image successfully!',
                'alert-type' => 'success',
            );

            return redirect()->route('admin.newsPost.index')->with($notification);
        }

    } // End Method

    public function Destroy($id)
    {
        $post_image = NewsPost::findOrFail($id);
        $image = $post_image->image;
        unlink($image);

        NewsPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'News post deleted successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function Inactive($id)
    {
        NewsPost::findOrFail($id)->update([
            'status' => 0,
        ]);

        $notification = array(
            'message' => 'News post inactive!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function Active($id)
    {
        NewsPost::findOrFail($id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'News post active!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

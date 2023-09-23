<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use App\Models\VideoGallery;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class VideoGalleryController extends Controller
{
    public function Index()
    {
        $video = VideoGallery::latest()->get();
        return view('admin.video.video_all', compact('video'));
    } // End Method

    public function Create()
    {
        return view('admin.video.video_create');
    } // End Method

    public function Store(Request $request)
    {
        $image = $request->file('video_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(784, 436)->save('upload/videogallery/' . $name_gen);
        $save_url = 'upload/videogallery/' . $name_gen;

        VideoGallery::insert([
            'video_title' => $request->video_title,
            'video_url' => $request->video_url,
            'post_date' => Carbon::now()->format('d F Y'),
            'video_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Video created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.videogallery.index')->with($notification);
    } // End Method

    public function Edit($id)
    {
        $video = VideoGallery::findOrFail($id);
        return view('admin.video.video_edit', compact('video'));
    } // End Method

    public function Update(Request $request, $id)
    {
        $video_id = VideoGallery::findOrFail($id);

        if ($request->file('video_image')) {
            $image = $request->file('video_image');
            if (file_exists($video_id->video_image)) {
                unlink($video_id->video_image);
            }
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('upload/videogallery/' . $name_gen);
            $save_url = 'upload/videogallery/' . $name_gen;

            $video_id->update([
                'video_title' => $request->video_title,
                'video_url' => $request->video_url,
                'post_date' => Carbon::now()->format('d F Y'),
                'video_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Video updated with image successfully!',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.videogallery.index')->with($notification);
        } else {
            $video_id->update([
                'video_title' => $request->video_title,
                'video_url' => $request->video_url,
                'post_date' => Carbon::now()->format('d F Y'),
            ]);

            $notification = array(
                'message' => 'Video updated without image successfully!',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.videogallery.index')->with($notification);
        }
    } // End Method

    public function Destroy($id)
    {
        $video = VideoGallery::findOrFail($id);
        $image = $video->video_image;
        unlink($image);

        $video->delete();

        $notification = array(
            'message' => 'Video deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

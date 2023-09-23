<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoGallery;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class PhotoGalleryController extends Controller
{
    public function Index()
    {
        $photo = PhotoGallery::latest()->get();
        return view('admin.photo.photo_all', compact('photo'));
    } // End Method

    public function Create()
    {
        return view('admin.photo.photo_create');
    } // End Method

    public function Store(Request $request)
    {
        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {
            $name_gen = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(700, 400)->save('upload/photogallery/' . $name_gen);
            $save_url = 'upload/photogallery/' . $name_gen;

            PhotoGallery::insert([
                'photo_gallery' => $save_url,
                'post_date' => Carbon::now()->format('d F Y'),
            ]);
        } // End Foreach

        $notification = array(
            'message' => 'Photo gallery created successfully!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.photogallery.index')->with($notification);
    } // End Method

    public function Edit($id)
    {
        $photoGallery = PhotoGallery::findOrFail($id);
        return view('admin.photo.photo_edit', compact('photoGallery'));
    } // End Method

    public function Update(Request $request, $id)
    {
        $photoId = PhotoGallery::findOrFail($id);

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            if (file_exists($photoId->photo_gallery)) {
                unlink($photoId->photo_gallery);
            }
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(700, 400)->save('upload/photogallery/' . $name_gen);
            $save_url = 'upload/photogallery/' . $name_gen;

            $photoId->update([
                'photo_gallery' => $save_url,
                'post_date' => Carbon::now()->format('d F Y'),
            ]);

            $notification = array(
                'message' => 'Photo gallery updated successfully!',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.photogallery.index')->with($notification);
        } // End If
    } // End Method

    public function Destroy($id)
    {
        $photoId = PhotoGallery::findOrFail($id);
        $img = $photoId->photo_gallery;
        unlink($img);
        PhotoGallery::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Photo gallery deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

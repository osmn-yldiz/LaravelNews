<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LiveTv;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class LiveTvController extends Controller
{
    public function Index()
    {
        $live = LiveTv::findOrFail(1);
        return view('admin.livetv.livetv_edit', compact('live'));
    } // End Method

    public function Update(Request $request, $id)
    {
        $liveId = LiveTv::findOrFail($id);

        if ($request->file('live_image')) {
            $image = $request->file('live_image');
            if (file_exists($liveId->live_image)) {
                unlink($liveId->live_image);
            }
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(784, 436)->save('upload/livetv/' . $name_gen);
            $save_url = 'upload/livetv/' . $name_gen;

            $liveId->update([
                'live_url' => $request->live_url,
                'post_date' => Carbon::now()->format('d F Y'),
                'live_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Live tv updated with image successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        } else {
            $liveId->update([
                'live_url' => $request->live_url,
                'post_date' => Carbon::now()->format('d F Y'),
            ]);

            $notification = array(
                'message' => 'Live tv updated without image successfully!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    } // End Method
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function ReviewPending()
    {
        $review = Review::where('status', 0)->orderBy('id', 'DESC')->get();
        return view('admin.review.review_pending', compact('review'));
    } // End Method

    public function ReviewApprove($id)
    {
        Review::where('id', $id)->update([
            'status' => 1,
        ]);

        $notification = array(
            'message' => 'Review approved successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method

    public function ApproveReview()
    {
        $review = Review::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.review.review_approve', compact('review'));
    } // End Method

    public function DestroyReview($id)
    {
        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review deleted successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

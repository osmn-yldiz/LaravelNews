<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ReviewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class ReviewController extends Controller
{
    public function reviewStore(Request $request)
    {
        $user = User::where('role', 'admin')->get();

        $news = $request->news_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'news_id' => $news,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        Notification::send($user, new ReviewNotification($request));

        return back()->with('status', 'Review Will Approve By Admin');
    } // End Method
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function SeoSiteSetting()
    {
        $seo = Seo::find(1);
        return view('admin.seo.seo_all', compact('seo'));
    } // End Method

    public function UpdateSeoSetting(Request $request, $id)
    {
        $seoId = Seo::findOrFail($id);

        $seoId->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
        ]);

        $notification = array(
            'message' => 'Seo settings updated successfully!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    } // End Method
}

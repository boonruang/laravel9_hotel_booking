<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Page;

class AdminPageController extends Controller
{
    public function about()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_about',compact('page_data'));
    }

    public function about_update(Request $request)
    {
        $request->validate([
            'about_heading' => 'required',
            'about_content' => 'required'
        ]);

        $obj = Page::where('id',1)->first();
        $obj->about_heading = $request->about_heading;
        $obj->about_content = $request->about_content;
        $obj->about_status = $request->about_status;
        $obj->update();

        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function terms()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_terms',compact('page_data'));
    }
    
    public function terms_update(Request $request)
    {
        $request->validate([
            'terms_heading' => 'required',
            'terms_content' => 'required'
        ]);

        $obj = Page::where('id',1)->first();
        $obj->terms_heading = $request->terms_heading;
        $obj->terms_content = $request->terms_content;
        $obj->terms_status = $request->terms_status;
        $obj->update();

        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function privacy()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_privacy',compact('page_data'));
    }
    
    public function privacy_update(Request $request)
    {
        $request->validate([
            'privacy_heading' => 'required',
            'privacy_content' => 'required'
        ]);

        $obj = Page::where('id',1)->first();
        $obj->privacy_heading = $request->privacy_heading;
        $obj->privacy_content = $request->privacy_content;
        $obj->privacy_status = $request->privacy_status;
        $obj->update();

        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function contact()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_contact',compact('page_data'));
    }
    
    public function contact_update(Request $request)
    {
        $request->validate([
            'contact_heading' => 'required',
            'contact_map' => 'required'
        ]);

        $obj = Page::where('id',1)->first();
        $obj->contact_heading = $request->contact_heading;
        $obj->contact_map = $request->contact_map;
        $obj->contact_status = $request->contact_status;
        $obj->update();

        return redirect()->back()->with('success','Data is updated successfully');
    }

    public function photo_gallery()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_photo_gallery',compact('page_data'));
    }
    
    public function photo_gallery_update(Request $request)
    {
        $request->validate([
            'photo_gallery_heading' => 'required',
        ]);

        $obj = Page::where('id',1)->first();
        $obj->photo_gallery_heading = $request->photo_gallery_heading;
        $obj->photo_gallery_status = $request->photo_gallery_status;
        $obj->update();

        return redirect()->back()->with('success','Data is updated successfully');
    }    

    public function video_gallery()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_video_gallery',compact('page_data'));
    }
    
    public function video_gallery_update(Request $request)
    {
        $request->validate([
            'video_gallery_heading' => 'required',
        ]);

        $obj = Page::where('id',1)->first();
        $obj->video_gallery_heading = $request->video_gallery_heading;
        $obj->video_gallery_status = $request->video_gallery_status;
        $obj->update();

        return redirect()->back()->with('success','Data is updated successfully');
    } 

    public function faq()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_faq',compact('page_data'));
    }
    
    public function faq_update(Request $request)
    {
        $request->validate([
            'faq_heading' => 'required',
        ]);

        $obj = Page::where('id',1)->first();
        $obj->faq_heading = $request->faq_heading;
        $obj->faq_status = $request->faq_status;
        $obj->update();

        return redirect()->back()->with('success','Data is updated successfully');
    }    

    public function blog()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_blog',compact('page_data'));
    }
    
    public function blog_update(Request $request)
    {
        $request->validate([
            'blog_heading' => 'required',
        ]);

        $obj = Page::where('id',1)->first();
        $obj->blog_heading = $request->blog_heading;
        $obj->blog_status = $request->blog_status;
        $obj->update();

        return redirect()->back()->with('success','Data is updated successfully');
    }      

}

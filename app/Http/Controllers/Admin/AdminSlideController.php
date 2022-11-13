<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slide::get();
        return view('admin.slide_view',compact('slides'));
    }

    public function add()
    {
        return view('admin.slide_add');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
        ]);  
        
        $ext = $request->file('photo')->extension();
        
        $final_name = time().'.'.$ext;
        
        $request->file('photo')->move(public_path('uploads/slides/'),$final_name);
        
        $obj = new Slide();
        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->button_text = $request->button_text;
        $obj->button_url = $request->button_url;
        $obj->save();

        return redirect()->route('admin_slide_view')->with('success','Slide is added successfully');

    }
}

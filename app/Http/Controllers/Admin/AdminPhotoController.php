<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Photo;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::get();
        return view('admin.photo_view',compact('photos'));
    }

    public function add()
    {
        return view('admin.photo_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2024'
        ]);
        
        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/photos'),$final_name);
        
        $photo = new Photo();
        $photo->photo = $final_name;
        $photo->caption = $request->caption;
        $photo->save();

        return redirect()->back()->with('success','Photo is added successfully');
    }
}

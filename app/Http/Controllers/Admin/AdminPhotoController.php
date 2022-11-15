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
        
        $obj = new Photo();
        $obj->photo = $final_name;
        $obj->caption = $request->caption;
        $obj->save();

        return redirect()->back()->with('success','Photo is added successfully');
    }

    public function edit($id)
    {
        $photo_single_data = Photo::where('id',$id)->first();
        return view('admin.photo_edit',compact('photo_single_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Photo::where('id',$id)->first();

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048'
            ]);

            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/photos'),$final_name);

            unlink(public_path('uploads/photos/'.$obj->photo));

            $obj->photo = $final_name;
        }

        $obj->caption = $request->caption;
        $obj->update();

        return redirect()->back()->with('success','Photo is Added successfully');
    }

    public function delete($id)
    {
        $photo_single_data = Photo::where('id',$id)->first();
        $photo_single_data->delete();

        unlink(public_path('uploads/photos/'.$photo_single_data->photo));

        return redirect()->back()->with('success','Photo is Deleted successfully');
    }

}

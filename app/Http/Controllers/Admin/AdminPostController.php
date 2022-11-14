<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.post_view',compact('posts'));
    }

    public function add()
    {
        return view('admin.post_add');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required',
        ]);  
        
        $ext = $request->file('photo')->extension();
        
        $final_name = time().'.'.$ext;
        
        $request->file('photo')->move(public_path('uploads/posts/'),$final_name);
        
        $obj = new Post();
        $obj->photo = $final_name;
        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = 1;
        $obj->save();

        return redirect()->back()->with('success','Post is added successfully');

    }    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        return view('admin.video_view',compact('videos'));
    }

    public function add()
    {
        return view('admin.video_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required'
        ]);
        
        $obj = new Video();
        $obj->video_id = $request->video_id;
        $obj->caption = $request->caption;
        $obj->save();

        return redirect()->back()->with('success','Video is added successfully');
    }

    public function edit($id)
    {
        $video_single_data = Video::where('id',$id)->first();
        return view('admin.video_edit',compact('video_single_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Video::where('id',$id)->first();

        $request->validate([
            'video_id' => 'required'
        ]);

        $obj->video_id = $request->video_id;
        $obj->caption = $request->caption;
        $obj->update();

        return redirect()->back()->with('success','Video is Added successfully');
    }

    public function delete($id)
    {
        $video_single_data = Video::where('id',$id)->first();
        $video_single_data->delete();

        return redirect()->back()->with('success','Video is Deleted successfully');
    }

}

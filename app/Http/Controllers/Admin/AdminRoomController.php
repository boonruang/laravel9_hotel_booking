<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPhoto;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::get();
        return view('admin.room_view',compact('rooms'));
    }


    public function add()
    {
        return view('admin.room_add');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $obj = new Room();
        $obj->name = $request->name;
        $obj->save();

        return redirect()->back()->with('success','room is Added successfully');

    }

    public function edit($id)
    {
        $room_data = Room::where('id',$id)->first();
        return view('admin.room_edit',compact('room_data'));
    }

    public function update(Request $request,$id)
    {
        $obj = Room::where('id',$id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        $obj->name = $request->name;
        $obj->update();

        return redirect()->back()->with('success','Room is Added successfully');
    }

    public function delete($id)
    {
        $single_data = Room::where('id',$id)->first();
        $single_data->delete();

        return redirect()->back()->with('success','Room is Deleted successfully');
    }            
}

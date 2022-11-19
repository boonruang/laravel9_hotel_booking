<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPhoto;
use App\Models\Amenity;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms = Room::get();
        return view('admin.room_view',compact('rooms'));
    }

    public function add()
    {
        $all_amenities = Amenity::get();
        return view('admin.room_add',compact('all_amenities'));
    }

    public function store(Request $request)
    {

        $amenities = '';

        $i = 0;
        if (isset($request->arr_amenities)){
            foreach($request->arr_amenities as $item){
                if ($i == 0 ) {
                    $amenities = $item;
                } else {
                    $amenities .= ','.$item;
                }
                $i++;
            }
        }

        $request->validate([
            'featured_photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required',
        ]);

        $ext = $request->file('featured_photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('featured_photo')->move(public_path('uploads/rooms/'),$final_name);

        $obj = new Room();
        $obj->featured_photo = $final_name ;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->video_id = $request->video_id;
        $obj->save();

        return redirect()->back()->with('success','Room is Added successfully');

    }

    public function edit($id)
    {
        $all_amenities = Amenity::get();
        $room_data = Room::where('id',$id)->first();

        $existing_amenities = array();

        if($room_data->amenities != '') {
            $existing_amenities = explode(',',$room_data->amenities); 
        }

        return view('admin.room_edit',compact('room_data','all_amenities','existing_amenities'));
    }

    public function update(Request $request,$id)
    {
        $obj = Room::where('id',$id)->first();

        $amenities = '';
        
        $i = 0;
        if (isset($request->arr_amenities)){
            foreach($request->arr_amenities as $item){
                if ($i == 0 ) {
                    $amenities = $item;
                } else {
                    $amenities .= ','.$item;
                }
                $i++;
            }
        }    

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required',
        ]);

        if ($request->hasFile('featured_photo')){
            
            $request->validate([
                'featured_photo' => 'required|mimes:jpg,jpeg,png,gif|max:2048'
            ]);

            unlink(public_path('uploads/rooms/'.$obj->featured_photo));

            $ext = $request->file('featured_photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('featured_photo')->move(public_path('uploads/rooms/'),$final_name);

            $obj->featured_photo =  $final_name;
        }

        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->video_id = $request->video_id;
        $obj->update();

        return redirect()->back()->with('success','Room is Updated successfully');
    }

    public function delete($id)
    {
        $single_data = Room::where('id',$id)->first();
        unlink(public_path('uploads/rooms/'.$single_data->featured_photo));

        $single_data->delete();

        return redirect()->back()->with('success','Room is Deleted successfully');
    }            
}

<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPhoto;
use App\Models\Amenity;

class RoomController extends Controller
{

    public function single_room($id)
    {
        $single_room_data = Room::with('rRoomPhoto')->where('id',$id)->first();
        $arr_amenities = explode(',',$single_room_data->amenities);

        $amenities = Amenity::get();

        return view('front.room_detail',compact('single_room_data','arr_amenities','amenities'));
    }
}

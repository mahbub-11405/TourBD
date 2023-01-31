<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class roomController extends Controller
{
    //
    public function Index(){

    	$hotel=DB::table('hotels')
    	->select('hotelId','hotelName')
    	->get();
    	return view('Admin.room.index',['hotel'=>$hotel]);
    }

    public function showRooms($id){
        $rooms=DB::table('rooms')
        ->leftjoin('room_images','rooms.roomId','room_images.roomId')
        ->select('rooms.roomId','rooms.roomName','rooms.roomCategory','rooms.roomCapasity','rooms.roomRent','rooms.description','rooms.hotelId','room_images.imageName')
        ->where([
            ['rooms.hotelId','=',$id],
            ['room_images.imageSerial','=',1]
        ])->get();
        return view('Frontend.hotel.rooms',['room'=>$rooms]);
    }

    public function addRoom(Request $request){

    	DB::table('rooms')->insert([
    		'roomName'=>$request->name,
    		'roomCategory'=>$request->category,
    		'roomRent'=>$request->rent,
    		'roomCapasity'=>$request->capacity,
    		'description'=>$request->description,
    		'hotelId'=>$request->hotel,
    	]);

    	$id=DB::table('rooms')
    	->select('roomId')->get();
    	foreach ($id as $val) {
    		$id=$val->roomId;
    	}

    	 $Image1= $request->file('image1');
        $imageName=$Image1->getClientOriginalName();
        $uploadPath='public/images/';
        $Image1->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('room_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>1,
			'roomId'=>$id,
    	]);
    	 $Image2= $request->file('image2');
        $imageName=$Image2->getClientOriginalName();
        $uploadPath='public/images/';
        $Image2->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('room_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>2,
			'roomId'=>$id,
    	]);
    	 $Image3= $request->file('image3');
        $imageName=$Image3->getClientOriginalName();
        $uploadPath='public/images/';
        $Image3->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('room_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>3,
			'roomId'=>$id,
    	]);

    	return redirect('/room/table');

    }

    public function tableRoom(){
    	$rooms=DB::table('rooms')
    	->select('roomId','roomName','roomCategory','roomRent','roomCapasity','description','hotelId'
    	)->get();
    	return view('Admin.room.list',['room'=>$rooms]);
    }

    public function viewRoom($id){
        $rooms=DB::table('rooms')
        ->leftjoin('room_images','rooms.roomId','=','room_images.roomId')
        ->select('rooms.roomId','rooms.roomName','rooms.roomCategory','rooms.roomRent','rooms.roomCapasity','rooms.description','rooms.hotelId','room_images.imageName'
        )->where('rooms.roomId','=',$id)
        ->get();
        return view('Admin.room.detail',['room'=>$rooms]);
    }

    public function roomView($id){
    	$rooms=DB::table('rooms')
    	->leftjoin('room_images','rooms.roomId','=','room_images.roomId')
    	->select('rooms.roomId','rooms.roomName','rooms.roomCategory','rooms.roomRent','rooms.roomCapasity','rooms.description','rooms.hotelId','room_images.imageName'
    	)->where('rooms.roomId','=',$id)
    	->get();
    	return view('Frontend.hotel.roomDetail',['room'=>$rooms]);
    }

    public function editRoom($id){
    	$rooms=DB::table('rooms')
    	->select('roomId','roomName','roomCategory','roomRent','roomCapasity','description','hotelId'
    	)->where('roomId','=',$id)
    	->get();
    	return view('Admin.room.edit',['room'=>$rooms]);
    }

    public function updateRoom(Request $request){
    	DB::table('rooms')->where([
    		['roomId','=',$request->id],
    	])->update([
    		'roomName'=>$request->name,
    		'roomCategory'=>$request->category,
    		'roomCapasity'=>$request->capacity,
    		'roomRent'=>$request->rent,
    	]);
    	return redirect('/room/table');
    }
public function deleteRoom($id){
    	DB::table('rooms')->where('roomId','=',$id)
    	->delete();
    	DB::table('room_images')->where('roomId','=',$id)
    	->delete();
    	return redirect('/room/table');
    	
    }


}
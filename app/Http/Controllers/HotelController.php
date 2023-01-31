<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;


class HotelController extends Controller
{
    //
    public function Index(){
        $locations=DB::table('locations')
        ->select('locationName','locationImage','locationId','locationRating')
        ->get();
    	return view('Frontend.hotel.index',['location'=>$locations]);
    }
    public function showHotels($id){
        $hotels=DB::table('hotels')
        ->leftjoin('hotel_images','hotels.hotelId','hotel_images.hotelId')
        ->leftjoin('hotel_reviews','hotels.hotelId','hotel_reviews.hotelId')
        ->whereRaw('reviewId in (select max(reviewId) from hotel_reviews group by (hotelId))')
        ->select('hotels.hotelId','hotels.hotelName','hotels.hotelCategory','hotels.contact','hotels.address','hotels.description','hotels.locationId','hotel_images.imageName','hotel_reviews.rate')
        ->where([
            ['hotels.locationId','=',$id],
            ['hotel_images.imageSerial','=',1]
        ])
        ->get();
        $row_count=DB::table('hotels')
        ->leftjoin('hotel_images','hotels.hotelId','hotel_images.hotelId')
        ->leftjoin('hotel_reviews','hotels.hotelId','hotel_reviews.hotelId')
        ->whereRaw('reviewId in (select max(reviewId) from hotel_reviews group by (hotelId))')
        ->select('hotels.hotelId','hotels.hotelName','hotels.hotelCategory','hotels.contact','hotels.address','hotels.description','hotels.locationId','hotel_images.imageName','hotel_reviews.rate')
        ->where([
            ['hotels.locationId','=',$id],
            ['hotel_images.imageSerial','=',1]
        ])
        ->count();
        if($row_count==0){
            return redirect('/');
        }
    	return view('Frontend.hotel.hotels',['hotel'=>$hotels]);
    }

    public function searchHotelRent(Request $request){
        $hotels=DB::table('hotels')
        ->leftjoin('hotel_images','hotels.hotelId','hotel_images.hotelId')
        ->leftjoin('rooms','hotels.hotelId','rooms.hotelId')
        ->whereRaw('roomRent in (select min(roomRent) from rooms group by (hotelId))')
        ->leftjoin('hotel_reviews','hotels.hotelId','hotel_reviews.hotelId')
        ->whereRaw('reviewId in (select max(reviewId) from hotel_reviews group by (hotelId))')
        ->select('hotels.hotelId','hotels.hotelName','hotels.hotelCategory','hotels.contact','hotels.address','hotels.description','hotels.locationId','hotel_images.imageName','hotel_reviews.rate','rooms.roomRent')
        ->where([
            ['hotels.locationId','=',$request->id],
            ['rooms.roomRent','<=',$request->rent],
            ['hotel_images.imageSerial','=',1]
        ])
        ->get();
        return view('Frontend.hotel.hotels',['hotel'=>$hotels]);
    }

    public function addHotels(){
    	$locations=DB::table('locations')
    	->select('locationName','locationImage','locationId')
    	->get();
    	return view('Admin.hotel.index',['location'=>$locations]);
    }

    public function addingHotels(Request $request){
    	DB::table('hotels')->insert([
    		'hotelName'=>$request->name,
    		'hotelCategory'=>$request->category,
    		'contact'=>$request->contact,
    		'address'=>$request->address,
    		'description'=>$request->description,
    		'locationId'=>$request->location,
    	]);

    	$id=DB::table('hotels')
    	->select('hotelId')->get();
    	foreach ($id as $val) {
    		$id=$val->hotelId;
    	}

    	 $Image1= $request->file('image1');
        $imageName=$Image1->getClientOriginalName();
        $uploadPath='public/images/';
        $Image1->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('hotel_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>1,
			'hotelId'=>$id,
    	]);
    	 $Image2= $request->file('image2');
        $imageName=$Image2->getClientOriginalName();
        $uploadPath='public/images/';
        $Image2->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('hotel_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>2,
			'hotelId'=>$id,
    	]);
    	 $Image3= $request->file('image3');
        $imageName=$Image3->getClientOriginalName();
        $uploadPath='public/images/';
        $Image3->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('hotel_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>3,
			'hotelId'=>$id,
    	]);
        //insert hotels dummy rating
        DB::table('hotel_reviews')
     ->insert([
            'rate'=>0,
            'headline'=>"a",
            'description'=>"abc",
            'hotelId'=>$id,
            'touristId'=>0,
        ]);

    	return redirect('/hotel/table');

    }

    public function tableHotels(){

    	$hotel=DB::table('hotels')
    	->select('hotelId','hotelName','hotelCategory','contact','address')
    	->get();
    	return view('Admin.hotel.list',['hotel'=>$hotel]);
    }

    public function viewHotel($id){

        $hotel=DB::table('hotels')
        ->leftjoin('hotel_images','hotels.hotelId','=','hotel_images.hotelId')
        ->select('hotel_images.imageName','hotels.hotelId','hotels.hotelName','hotels.hotelCategory','hotels.contact','hotels.address','hotels.description','hotels.locationId')
        ->where('hotels.hotelId','=',$id)
        ->get();   
    	return view('Admin.hotel.detail',['hotel'=>$hotel]);
    }

    public function hotelview($id){

        $hotel=DB::table('hotels')
        ->leftjoin('hotel_images','hotels.hotelId','=','hotel_images.hotelId')
        ->select('hotel_images.imageName','hotels.hotelId','hotels.hotelName','hotels.hotelCategory','hotels.contact','hotels.address','hotels.description','hotels.locationId')
        ->where('hotels.hotelId','=',$id)
        ->get();
        return view('Frontend.hotel.detail',['hotel'=>$hotel]);
    }

    public function editHotel($id){
    	$hotel=DB::table('hotels')
    	->select('hotelId','hotelName','hotelCategory','contact','address')
    	->get();
    	return view('Admin.hotel.edit',['hotel'=>$hotel]);
    }

    public function updateHotel(Request $request){
    	DB::table('hotels')->where([
    		['hotelId','=',$request->id],
    	])->update([
    		'hotelName'=>$request->name,
    		'hotelCategory'=>$request->category,
    		'contact'=>$request->contact,
    		'address'=>$request->address,
    	]);
    	return redirect('/hotel/table');
    }

    public function deleteHotel($id){
    	DB::table('hotels')->where('hotelId','=',$id)
    	->delete();
    	DB::table('hotel_images')->where('hotelId','=',$id)
    	->delete();
    	return redirect('/hotel/table');
    	
    }

    public function rateHotel($id){

        if(!Session::get('tourist')){
                return redirect('/hotel/view/'.$id);
            }
            else{
                $tour=Session::get('tourist');
                foreach ($tour as $tours) {
                $rid=$tours->touristId;
            }
        $rev=DB::table('hotel_reviews')
        ->leftjoin('hotels','hotel_reviews.hotelId','hotels.hotelId')
        ->where([
            ['hotel_reviews.touristId','=',$rid],
            ['hotels.hotelId','=',$id],
        ])
        ->select('hotel_reviews.rate')
        ->count();
        if($rev>0){
            return redirect('/hotel/view/'.$id);
        }
        else{

         $hotel=DB::table('hotels')
        ->select('hotelId','hotelName','hotelCategory','contact','address','description','locationId')
        ->where('hotels.hotelId','=',$id)
        ->get();
        return view('Frontend.hotel.rate',['hotel'=>$hotel]);
        }

            }


    }
    public function updateHotelRating(Request $request){
        $tour=Session::get('tourist');
            foreach ($tour as $tours) {
                $id=$tours->touristId;
            }
     DB::table('hotel_reviews')
     ->insert([
            'rate'=>$request->rate,
            'headline'=>$request->head,
            'description'=>$request->description,
            'hotelId'=>$request->hID,
            'touristId'=>$id,
        ]);
        $hotel=DB::table('hotels')
        ->leftjoin('hotel_images','hotels.hotelId','=','hotel_images.hotelId')
        ->select('hotel_images.imageName','hotels.hotelId','hotels.hotelName','hotels.hotelCategory','hotels.contact','hotels.address','hotels.description','hotels.locationId')
        ->where('hotels.hotelId','=',$request->hID)
        ->get();
        return view('Frontend.hotel.detail',['hotel'=>$hotel]);   
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class locationController extends Controller
{
    //
    public function addLocation(){
    	return view('Admin.location.Index');
    }

    public function addNewLocation(Request $request){
    	 $Image= $request->file('image');
        $imageName=$Image->getClientOriginalName();
        $uploadPath='public/images/';
        $Image->move($uploadPath,$imageName);
        $image1=$uploadPath.$imageName;
    	DB::table('locations')->insert([
            'locationName'=>$request->location,
    		'locationRating'=>$request->rating,
			'locationImage'=>$image1,
    	]);
    	return redirect('/location/table');
    }

    public function showLocation(){
    	$locations=DB::table('locations')
    	->select('locationName','locationImage','locationId')
    	->get();
    	return view('Admin.location.list',['location'=>$locations]);
    }

    public function editLocation($id){
    	$locations=DB::table('locations')
    	->select('locationName','locationImage','locationId')
    	->where('locationId','=',$id)->get();
    	return view('Admin.location.edit',['location'=>$locations]);
    }

    public function updateLocation(Request $request){
    		 $Image= $request->file('image');
        $imageName=$Image->getClientOriginalName();
        $uploadPath='public/images/';
        $Image->move($uploadPath,$imageName);
        $image1=$uploadPath.$imageName;
    	DB::table('locations')
    	->where('locationId','=',$request->id)
    	->update([
    		'locationName'=>$request->location,
			'locationImage'=>$image1,
    	]);
    	return redirect('/location/table');
    }

     public function deleteLocation($id){
     	DB::table('locations')
    	->where('locationId','=',$id)->delete();
    	return redirect('/location/table');
     }

}

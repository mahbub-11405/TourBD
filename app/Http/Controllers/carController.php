<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class carController extends Controller
{
	public function addCar(){

		if(!Session::get('rentCar')){
    			return redirect('/login/rent');
    		}
$locations=DB::table('locations')
    	->select('locationName','locationImage','locationId')
    	->get();
    			
		return view('Frontend.car.index',['location'=>$locations]);
	}

    public function showCars($id){
         $cars=DB::table('cars')
        ->leftjoin('car_images','cars.carId','car_images.carId')
        ->select('cars.carId','cars.carName','cars.carCategory','cars.carCapasity','cars.carRent','cars.description','cars.carDestination','car_images.imageName')
        ->where([
            ['cars.rentId','=',$id],
            ['car_images.imageSerial','=',1]
        ])->get();
        return view('Frontend.car.cars',['car'=>$cars]);
    }

    public function bookCars($id){
        if(!Session::get('tourist')){
                return redirect('/tourist/login');
            }
          $cars=DB::table('cars')
        ->select('carId','carName','carCategory','carCapasity','carRent','description','carDestination','rentId')
        ->where([
            ['carId','=',$id],
        ])->get();
        return view('Frontend.rent.book',['car'=>$cars]);
    }

    public function showMyCars($id){
        $cars=DB::table('cars')
        ->leftjoin('car_images','cars.carId','car_images.carId')
        ->select('cars.carId','cars.carName','cars.carCategory','cars.carCapasity','cars.carRent','cars.description','cars.carDestination','car_images.imageName')
        ->where([
            ['cars.carId','=',$id],
        ])->get();
        return view('Frontend.car.myCar',['car'=>$cars]);
    }

	public function updateCar(Request $request){
		$rent=Session::get('rentCar');
    			foreach ($rent as $rents) {
    				$rentId=$rents->rentId;
    			}
		    	DB::table('cars')->insert([
    		'carName'=>$request->name,
    		'carCategory'=>$request->category,
    		'carCapasity'=>$request->capasity,
    		'carRent'=>$request->rent,
    		'description'=>$request->description,
    		'carDestination'=>$request->destination,
    		'rentId'=>$rentId,
    	]);

    	$id=DB::table('cars')
    	->select('carId')->get();
    	foreach ($id as $val) {
    		$id=$val->carId;
    	}

    	 $Image1= $request->file('image1');
        $imageName=$Image1->getClientOriginalName();
        $uploadPath='public/images/';
        $Image1->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('car_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>1,
			'carId'=>$id,
    	]);
    	 $Image2= $request->file('image2');
        $imageName=$Image2->getClientOriginalName();
        $uploadPath='public/images/';
        $Image2->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('car_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>2,
			'carId'=>$id,
    	]);
    	 $Image3= $request->file('image3');
        $imageName=$Image3->getClientOriginalName();
        $uploadPath='public/images/';
        $Image3->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('car_images')->insert([
    		'imageName'=>$image,
			'imageSerial'=>3,
			'carId'=>$id,
    	]);

    	return redirect('/car/table');
	}

	public function tableCar(){
		if(!Session::get('rentCar')){
    			return redirect('/login/rent');
    		}
    		$rent=Session::get('rentCar');
    			foreach ($rent as $rents) {
    				$rentId=$rents->rentId;
    			}

    	$car=DB::table('cars')
    	->where('rentId','=',$rentId)
    	->select('carId','carName','carCategory','carCapasity','carRent','carDestination')
    	->paginate(5);
    	return view('Frontend.car.list',['car'=>$car]);
	}

	public function viewCar($id){
		if(!Session::get('rentCar')){
    			return redirect('/login/rent');
    		}

		$cars=DB::table('cars')
		->leftjoin('car_images','cars.carId','=','car_images.carId')
		->select('cars.carName','cars.carCategory','cars.carCapasity','cars.carRent','cars.carDestination','cars.description','car_images.imageName')
		->where('cars.carId','=',$id)
		->get();
		return view('Frontend.car.detail',['car'=>$cars]);
	}

	public function editCar($id){
		if(!Session::get('rentCar')){
    			return redirect('/login/rent');
    		}
		$cars=DB::table('cars')
		->select('carName','carCategory','carCapasity','carRent','carDestination','description','carId')
		->where('carId','=',$id)
		->get();

		return view('Frontend.car.edit',['car'=>$cars]);
	}

	public function updatingCar(Request $request){
		    	DB::table('cars')
		    	->where([
		    		['carId','=',$request->id],
		    	])
		    	->update([
    		'carName'=>$request->name,
    		'carCategory'=>$request->category,
    		'carCapasity'=>$request->capasity,
    		'carRent'=>$request->rent,
    	]);
$id=$request->id;
    	 $Image1= $request->file('image1');
        $imageName=$Image1->getClientOriginalName();
        $uploadPath='public/images/';
        $Image1->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('car_images')
    	->where([
   			['imageSerial','=',1],
			['carId','=',$id],
    	])
    	->update([
    		'imageName'=>$image,
    	]);
    	 $Image2= $request->file('image2');
        $imageName=$Image2->getClientOriginalName();
        $uploadPath='public/images/';
        $Image2->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('car_images')
    	->where([
			['imageSerial','=',2],
			['carId','=',$id],

    	])
    	->update([
    		'imageName'=>$image,
    	]);
    	 $Image3= $request->file('image3');
        $imageName=$Image3->getClientOriginalName();
        $uploadPath='public/images/';
        $Image3->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('car_images')
    	->where([
			['imageSerial','=',3],
			['carId','=',$id],

    	])
    	->update([
    		'imageName'=>$image,
    	]);

    	return redirect('/car/table');

	}

	public function deleteCar($id){
		DB::table('cars')
		    	->where([
		    		['carId','=',$id],
		    	])->delete();
    	DB::table('car_images')
    	->where([
			['carId','=',$id],

    	])->delete();
    	return redirect('/car/table');
	}


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class RentController extends Controller
{
    //
    public function Index(){
        $locations=DB::table('locations')
        ->select('locationName','locationImage','locationId')
        ->get();
    	return view('Frontend.rent-a-car.Index',['location'=>$locations]);
    }
    public function showCars(){
         $rents=DB::table('rent_a_cars')
        ->select('rentId','rentName','rentEmail','contact','address','rentImage','locationId')
        ->get();
    	return view('Frontend.rent-a-car.cars',['rent'=>$rents]);
    }

    public function searchCarsRent(Request $request){

         $rents=DB::table('rent_a_cars')
         ->leftjoin('cars','rent_a_cars.rentId','cars.rentId')
        ->whereRaw('carRent in (select min(carRent) from cars group by (rentId))')
        ->select('rent_a_cars.rentId','rent_a_cars.rentName','rent_a_cars.rentEmail','rent_a_cars.contact','rent_a_cars.address','rent_a_cars.rentImage','rent_a_cars.locationId','cars.carRent')
        ->where([
            ['cars.carRent','<=',$request->rent],
            ['cars.carCapasity','>=',$request->tNo]
        ])
        ->get();
        return view('Frontend.rent-a-car.cars',['rent'=>$rents]);
    }

    public function registerRent(){
    	$locations=DB::table('locations')
    	->select('locationName','locationImage','locationId')
    	->get();
    	return view('Frontend.rent-a-car.register',['location'=>$locations]);
    }

    public function RegistrationRent(Request $request){
    	 $Image1= $request->file('image');
        $imageName=$Image1->getClientOriginalName();
        $uploadPath='public/images/';
        $Image1->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('rent_a_cars')->insert([
    		'rentName'=>$request->name,
			'rentEmail'=>$request->email,
			'rentPassword'=>$request->password,
			'contact'=>$request->contact,
			'address'=>$request->address,
			'rentImage'=>$image,
			'locationId'=>$request->location,
    	]);
    	return redirect('/login/rent');
    }

    public function loginRent(){
    	return view('Frontend.rent-a-car.login');
    }

    public function logRent(Request $req){
    	$rent=DB::table('rent_a_cars')
    	->where([
            ['rentEmail','=',$req->email],
            ['rentPassword','=',$req->password],  
        ])->count();


        if($rent==1){
        $company=DB::table('rent_a_cars')->select('rentId','rentName', 'rentEmail','rentPassword')->where([
            ['rentEmail','=',$req->email],
            ['rentPassword','=',$req->password],  
        ])->get();

        Session::put('rentCar',$company);
            return redirect('/Rent-A-Car');
        }
        else{
            return redirect('/login/rent');
        }
    	}

    	public function rentProfile($id){
    		if(!Session::get('rentCar')){
    			return redirect('/login/rent');
    		}
			$rents=DB::table('rent_a_cars')->select('rentId','rentName', 'rentEmail','rentImage','contact','address')->where([
            ['rentId','=',$id],  
        ])->get();
    		return view('Frontend.rent-a-car.profile',['rent'=>$rents]);
    	}

    	public function logOutRent(){
    		 session()->flush();
            return redirect('/login/rent');

    	}

        public function bookingCar(Request $req){
            $tour=Session::get('tourist');
            foreach ($tour as $tours) {
                $touristId=$tours->touristId;
            }
            DB::table('rents')->insert([
                'carId'=>$req->id,
                'rentId'=>$req->rentId,
                'touristId'=>$touristId,
                'rent'=>$req->rent,
                'date'=>date('D/M/Y'),
                'aproval'=>"requested"
            ]);
            return redirect('/rent/Requests');
        }

        public function rentRequests(){
             $tour=Session::get('tourist');
            foreach ($tour as $tours) {
                $touristId=$tours->touristId;
            }
            $req=DB::table('rents')
            ->select('rentalId','touristId','rent','date','aproval','carId')
            ->where([
                ['aproval','=',"requested"],
                ['touristId','=',$touristId]
        ])->get();
            return view('Frontend.rent.touristRequest',['request'=>$req]);
        }
        public function editRequests($id){

            $req=DB::table('rents')
            ->select('rentalId','touristId','rent','date','aproval','carId')
            ->where([
                ['rentalId','=',$id],
        ])->get();

            return view('Frontend.rent.edit',['req'=>$req]);
        }

        public function updateBookingCar(Request $req){

            DB::table('rents')->where([
                ['rentalId','=',$req->id],
        ])->update([
                'rent'=>$req->rent,
            ]);
            return redirect('/rent/Requests');
        }

        public function deleteRequest($id){
            DB::table('rents')->where([
                ['rentalId','=',$id],
        ])->delete();
            return redirect('/rent/Requests');
        }

        public function rentTable(){
            $tour=Session::get('tourist');
            foreach ($tour as $tours) {
                $touristId=$tours->touristId;
            }
            $req=DB::table('rents')
            ->leftjoin('rent_a_cars','rents.rentId','=','rent_a_cars.rentId')
            ->select('rents.rentalId','rents.touristId','rents.rent','rents.date','rents.aproval','rents.carId','rent_a_cars.rentName','rent_a_cars.contact')
            ->where([
                ['aproval','=',"accepted"],
                ['touristId','=',$touristId]
        ])->get();
            return view('Frontend.rent.aproved',['aproved'=>$req]);
        }

        public function clientRentRequests(){
             $rent=Session::get('rentCar');
            foreach ($rent as $rents) {
                $id=$rents->rentId;
            }
            $req=DB::table('rents')
            ->leftjoin('rent_a_cars','rents.rentId','=','rent_a_cars.rentId')
            ->select('rents.rentalId','rents.touristId','rents.rent','rents.date','rents.aproval','rents.carId','rent_a_cars.rentName')
            ->where([
                ['rent_a_cars.rentId','=',$id],
        ])->get();
            return view('Frontend.rent.request',['request'=>$req]);
        }

        public function AcceptRent($id){

            DB::table('rents')
            ->where('rentalId','=',$id)
            ->update([
                'aproval'=>"accepted"
            ]);
            return redirect('/client/rent/requests');
        }
        public function denyRent($id){

            DB::table('rents')
            ->where('rentalId','=',$id)
            ->update([
                'aproval'=>"denied"
            ]);
            return redirect('/client/rent/requests');
        }




    }










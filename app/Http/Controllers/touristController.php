<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class touristController extends Controller
{
	public function touristRegister(){
		return view('Frontend.tourist.register');
	}

	public function touristRegistration(Request $request){
	
	 $Image1= $request->file('image');
        $imageName=$Image1->getClientOriginalName();
        $uploadPath='public/images/';
        $Image1->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
    	DB::table('tourists')->insert([
    		'touristName'=>$request->name,
			'touristEmail'=>$request->email,
			'touristPassword'=>$request->password,
			'contact'=>$request->contact,
			'address'=>$request->address,
			'touristImage'=>$image,
    	]);
    	return redirect('/tourist/login');
	}

	public function touristLogin(){
		return view('Frontend.tourist.login');
	}

	public function LoginTourist(Request $req){

		$tourist=DB::table('tourists')
    	->where([
            ['touristEmail','=',$req->email],
            ['touristPassword','=',$req->password],  
        ])->count();


        if($tourist==1){
        $tourar=DB::table('tourists')->select('touristId','touristName', 'touristEmail','touristPassword')->where([
            ['touristEmail','=',$req->email],
            ['touristPassword','=',$req->password],   
        ])->get();

        Session::put('tourist',$tourar);
            return redirect('/');
        }
        else{
            return redirect('/tourist/login');
        }
	}

	public function touristLogout(){
		session()->flush();
            return redirect('/tourist/login');
	}

    public function touristProfile($id){

        $tourar=DB::table('tourists')->select('touristId','touristName', 'touristEmail','touristPassword','contact','address','touristImage')->where([
            ['touristId','=',$id],  
        ])->get();
        return view('Frontend.tourist.profile',['tourist'=>$tourar]);
    }

    public function editTouristProfile($id){
        $tourar=DB::table('tourists')->select('touristId','touristName', 'touristEmail','touristPassword','contact','address','touristImage')->where([
            ['touristId','=',$id],  
        ])->get();
        return view('Frontend.tourist.edit',['tourist'=>$tourar]);
    }

    public function updateTourist(Request $request){
         $Image1= $request->file('image');
        $imageName=$Image1->getClientOriginalName();
        $uploadPath='public/images/';
        $Image1->move($uploadPath,$imageName);
        $image=$uploadPath.$imageName;
        DB::table('tourists')->where([
            ['touristId','=',$request->id],  
        ])->update([
            'touristName'=>$request->name,
            'touristEmail'=>$request->email,
            'touristPassword'=>$request->password,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'touristImage'=>$image,
        ]);
        return redirect('/');
    }

}
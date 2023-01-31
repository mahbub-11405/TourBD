<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function Index(){
    	return view('Admin.dashboard.index');
    }
}

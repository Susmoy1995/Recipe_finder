<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logoutController extends Controller
{
    //
     function loggingout(Request $req){
    	$req->session()->flush();
    	return redirect()->route('loginview');	
    //return view('index');
    }


   
}

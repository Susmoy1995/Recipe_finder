<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\contactRequest;

class messageController extends Controller
{
    //


    public function insertMessage(contactRequest $request){

    	$message=[
	    	'email'=>$request->cont_email,
	    	'message'=>$request->post_message
    	];

    	DB::table('messages')->insert($message);

    	// /return view('index');

    	return redirect('/');


    }
}

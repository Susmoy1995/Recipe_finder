<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class likeController extends Controller
{
    //

    function like(Request $request){


    	$data =[
    		'blogger_id'=>$request->lb_id,
    		'post_id'=>
    	];	




    	return view('like');
    }
}

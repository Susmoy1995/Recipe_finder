<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Http\Requests\postValidationRequest;
use Carbon\Carbon;

class uploadPostController extends Controller
{
    //

// inserting post to blog site
 function postInsert(Request $request,postValidationRequest $validation){

       
       // $url= $request->image->store('public') ;
 	
 	$fileName=$request->image->getClientOriginalName();

        $request->image->storeAs('public',$fileName);
    	$url= Storage::url($fileName);

      
      $current = Carbon::now();
      // $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Europe/Stockholm');
      $current->setTimezone('Asia/Dhaka');
      $time = $current->toDayDateTimeString();
      //$current = new Carbon();


    	$data=[
    		'blogger_id'=>$request->b_id,
    		'post_title'=>$request->title,
    		'post'=>$request->post_desc,
        'time'=>$time,
    		'post_image'=>$url,
        'post_status'=>'pending'
    	];

    	 DB::table('posts')->insert($data);

    	 //return redirect()->route('blogposted');

    //	return view('userdashboard.userdashboard');

         //return view('index');

         return redirect()->route('post.list');

         		
    }
}

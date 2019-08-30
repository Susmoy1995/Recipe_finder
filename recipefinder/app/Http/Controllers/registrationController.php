<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\regValidationRequest;

class registrationController extends Controller
{
    //

    function registration(){
    	return view('registration.registration');
    }

    function bloggerInsert(regValidationRequest $req){

	        // inserting blogger data while registration

   




            $data=[
      
		        'blogger_email'=>$req->email,
		        'blogger_password'=>$req->password,
		    	
		    	'blogger_name'=> $req->username, 
		    	'phone_number'=> $req->phonenumber, 
		    	'usertype'=> 'blogger',
                'blogger_status'=>'active'
    	
    		];	
    		  DB::table('bloggers')
		      ->insert($data);

             $blogger = DB::table('bloggers')
             ->where('blogger_email',$req->email)
             ->first();   

    		$loginData= [
                'user_id'=>$blogger->blogger_id,
    			'name'=>$req->username,
    			'email'=>$req->email,
    			'password'=>$req->password,
    			'usertype'=>'blogger'		
    		];

    		DB::table('users')
		      ->insert($loginData);


		    $req->session()->put('reg',1);
		    return redirect()->route('loginview');

    

              
		    }
    }


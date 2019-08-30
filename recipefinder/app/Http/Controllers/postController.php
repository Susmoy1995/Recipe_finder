<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\URL;


class postController extends Controller
{
    // showing single post

  public function posted(){
  	return view('posts.post');
  }

 public function singlePost(Request $request,$id){

       $singlePost = DB::table('posts')
       ->join('bloggers','bloggers.blogger_id','=','posts.blogger_id')
       ->where('posts.post_id',$id)
       ->first();


       
        $data= json_decode( json_encode($id), true);

          $username = DB::table('bloggers')
             ->where('blogger_id',$data)
            ->first();
        
      // $request->session()->put('single_post')

    	return view('posts.post')
      ->with('single_post',$singlePost)
      ->with('username',$username);
     



 }



}

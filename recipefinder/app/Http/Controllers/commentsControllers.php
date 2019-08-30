<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class commentsControllers extends Controller
{
    //




    function comments(Request $request,$id){

    	$singlePost = DB::table('posts')
    	->join('bloggers','bloggers.blogger_id','=','posts.blogger_id')
    	->where('post_id',$id)
    	->first();


      
       $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);

          $username = DB::table('bloggers')
             ->where('blogger_id',$data)
            ->first();

    	return view('comments.comments')
    	->with('single_post',$singlePost)
      ->with('username',$username);
    }


    function postComments(Request $request,$id){

       

       if(!empty($request->comments) && !empty($request->blog_id) && !empty($request->p_id)){
        	$comments =[
    		'comment'=> $request->comments,
    		'blogger_id'=>$request->blog_id,
    		'post_id'=>$request->p_id
        
    	];

    	DB::table('comments')
    	->insert($comments);

    	

       } 
    	
          return redirect()->route('comments',['id'=>$id]);
    }



     function postReply(Request $request,$id){


   //    if( !empty($request->reply) 
   //    	&& !empty($request->c_id) 
   //    	&& !empty($request->bl_id) 
   //    	&& !empty($request->po_id) ){
			// $reply =[
	  //       	'reply'=>$request->reply,
	  //       	'comment_id'=>$request->c_id,
	  //       	'blogger_id'=>$request->bl_id,
	  //       	'post_id'=>	$request->po_id
	  //       ];


   //    	DB::table('replies')
   //  	->insert($reply);
     // }

        

    	return redirect()->route('comments',['id'=>$id]);

    	//return view('index');

    }

    // function retrieveComment($id){
    // 	$ret_comment = DB::table('comments')
    // 	->where('post_id',$id)
    // 	->get();

    // 	return view('comments.comments')
    // 	->with('blogger_comment',$ret_comment);
    // }


   




}

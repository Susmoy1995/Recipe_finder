<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class replyController extends Controller
{
    //

   //  function postReply(Request $request,$id){


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
   //    }

        

   //  	return redirect()->route('comments',['id'=>$id]);

   //  	//return view('index');

   //  }

	 function reply($id){
    	return view('comments.reply');
    }
}

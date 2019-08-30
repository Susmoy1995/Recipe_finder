<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class retrieveCommentController extends Controller
{
    //
     function retrieveComment($id){
    	$ret_comment = DB::table('comments')
    	->where('post_id',$id)
    	->get();

    	return view('comments.comments')
    	->with('blogger_comment',$ret_comment);
    }
}

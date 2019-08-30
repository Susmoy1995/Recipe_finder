<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class loginController extends Controller
{
    //

    function index(){
    	return view('index');
    }


    function getAllPost(Request $request){
    	$posts = DB::table('posts')
    	->join('bloggers','posts.blogger_id','=','bloggers.blogger_id')
        ->where('posts.post_status','approve')
    	->paginate(5);


          $results = DB::select( DB::raw("SELECT p.*, c.postcount FROM posts as p INNER JOIN ( SELECT post_id, count(*) AS postcount FROM comments GROUP BY post_id ) as c on p.post_id = c.post_id Order by c.postcount desc") );

  $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);

          $username = DB::table('bloggers')
             ->where('blogger_id',$data)
            ->first();



    	//$request->session()->put('blogger_post',$posts);
    	return view('index')
        ->with('blogger_post',$posts)
        ->with('result',$results)
        ->with('username',$username);	
    }

    function login(){
    	return view('login.login');
    }

   
   
}

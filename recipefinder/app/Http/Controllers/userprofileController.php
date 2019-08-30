<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class userprofileController extends Controller
{
    //

    function userprofile(Request $request,$id){
    	//return redirect()->route('userprofile',['id'=>$id]);
        
    	$userpost = DB::table('posts')
        ->join('bloggers','bloggers.blogger_id','=','posts.blogger_id')
        ->where('bloggers.blogger_id',$id)
        ->paginate(3);

 $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);

          $username = DB::table('bloggers')
             ->where('blogger_id',$data)
            ->first();
    	return view('userdashboard.userprofile')->with('post',$userpost)
    	->with('username',$username);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\loginValidationRequest;
use Illuminate\Support\Facades\DB;

class loginPerformController extends Controller
{
    //

     function loginPosted(loginValidationRequest $req,$id){
     



       $login = DB::table('users')->select('*')
       ->get();

       $req->session()->put('signin',$login);

       

       $admin = DB::table('admins')->first();

       

       if ($req->input('useremail')==$admin->admin_email &&
           $req->input('password')==$admin->admin_password){
             
             $req->session()->put('admin_info',$admin);
         
              return view('index');

       }else{
          //query builder for finding the blogger id
                 $user = DB::table('bloggers')
                ->where('blogger_email',$req->useremail)
                ->where('blogger_password',$req->password)
                ->first();

                if(!$user){
                     $req->session()->flash('message','invalid username and password');
                    return redirect()->route('loginview');
                }else{
                     $req->session()->put('user',$user);

                    if($req->session()->has('user')){
                        return view('userdashboard.userdashboard');

                    }else{
                         
                        return view('login.login');
                    }
                }
       }


// $check =0;


//       $user = DB::table('users')
//       ->get();

//       foreach($user as $login){
//         if($req->useremail == $login->email && $req->password == $login->password){
//             if($login->usertype == "blogger"){
                
//                 $blogger = DB::table('bloggers')
//                 ->where('blogger_email',$login->email)
//                 ->first();

//                  $req->session()->put('user',$blogger);

//                  return view('index'); 


//             }else if($login->usertype == "admin"){

          
//                  $admin = DB::table('admins')
//                 ->where('admin_email',$login->email)
//                 ->first();

//                  $req->session()->put('admin_info',$admin);

//                  return view('index');
              
//             }
//             else
//             {
//                   $check++;
//             }


//        }
      


//       }



//       if($check>0){
//           $req->session()->flash('message','invalid username and password');
//                     return redirect()->route('loginview');
//       }

       

       
        


       




    }
}

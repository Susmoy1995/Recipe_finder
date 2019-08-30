<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\loginValidationRequest;
use App\Http\Requests\editPostRequest;
use App\Http\Requests\editProfileRequest;

use Intervention\Image\Facades\Image;
use Carbon\Carbon;


class userdashboardController extends Controller
{
 function loadUserPost(Request $req){


        $id = $req->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);


        $userpost = DB::table('posts')
        ->join('bloggers','bloggers.blogger_id','=','posts.blogger_id')
        ->where('bloggers.blogger_id',$data)
        ->paginate(2);
        $blogger_information = DB::table('bloggers')
        ->where('blogger_id',$data)
        ->first();

       //$req->session()->put('user_post',$userpost);

        if(!$userpost){
        
                return 'not found'; 
        }else{
              
                return view('userdashboard.userdashboard')
                ->with('singlePost',$userpost)
                ->with('profileValue',$blogger_information);         
        }
        

        //return $id;
    } 


     
      function loginPosted(loginValidationRequest $req){

           $login = DB::table('users')->select('*')
       ->get();

       $req->session()->put('signin',$login);

       

       $admin = DB::table('admins')->first();

       

       if ($req->input('useremail')==$admin->admin_email &&
           $req->input('password')==$admin->admin_password){
             
             $req->session()->put('admin_info',$admin);
         
             // return view('admin.admindashboard');
           return redirect()->route('stat');

       }else{
          //query builder for finding the blogger id
                 $user = DB::table('bloggers')
                ->where('blogger_email',$req->useremail)
                ->where('blogger_password',$req->password)
                ->where('blogger_status','active')
                ->first();

                if(!$user){
                     $req->session()->flash('message','invalid username and password');
                    return redirect()->route('loginview');
                }else{
                     $req->session()->put('user',$user);
                     //dd($user);

                    if($req->session()->has('user')){
                        return redirect()->route('dashboard',['id'=>$user->blogger_id]);

                    }else{
                         
                        return view('login.login');
                    }
                }
       }

     }

     // edit post for user
     public function gotToEditPost(Request $request,$id){


        $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);

          $editPost = DB::table('posts')
          ->where('blogger_id',$data)
          ->first();

          //dd(Storage::url($editPost->post_image));



          $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);

          $username = DB::table('bloggers')
             ->where('blogger_id',$data)
            ->first();

          return view('userdashboard.edit_post')->with('edit',$editPost)->with('username',$username);

     }

     public function editing_post(editPostRequest $request,$id){



      $current = Carbon::now();
      // $date = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'Europe/Stockholm');
      $current->setTimezone('Asia/Dhaka');
      $time = $current->toDayDateTimeString();





  // $fileName=$request->edit_image->getClientOriginalName();

  //       $request->edit_image->storeAs('public',$fileName);
  //     $url= Storage::url($fileName);
      
  //     $mimetype = Storage::mimeType($fileName);

        $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);


        // if(!$url && $mimetype == "jpeg" || $mimetype == "png" || $mimetype == "bmp" ||
        // $mimetype == "bmp" || $mimetype == "tiff")

        // {
           $data = [
            
            // 'post_image'=>$url,
            'post_title' => $request->edit_title,
            'post' => $request->edit_post_desc,
            'time' => $time,
            
        ];


        DB::table('posts')
            ->where('post_id',$request->ep_id)
            ->update($data);

            return redirect()->route('dashboard',['id'=>$data]);

        // }else{
        //     $req->session()->flash('message','lnvalid file type choose jpeg,jpg,bmp,tiff');
        //             return redirect()->route('dashboard',['id'=>$data]);
        // }
       
     }
     

     // delete post
      public function gotToDeletePost(Request $request,$id){


        $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);

          $deletePost = DB::table('posts')
          ->where('blogger_id',$data)
          ->first();

          $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);

          $username = DB::table('bloggers')
             ->where('blogger_id',$data)
            ->first();

          return view('userdashboard.delete_post')->with('delete',$deletePost)->with('username',$username);

     }

       public function deleting_post(Request $request,$id){
          DB::table('posts')
            ->where('post_id', $request->pd_id)
            ->delete();

             $id = $request->session()->get('user','blogger_id');
             $data= json_decode( json_encode($id), true);

       //  return redirect()->route('admin.post',['id'=>$id]);
          return redirect()->route('dashboard',['id'=>$data]);
    }


    public function gotoEditProfile(Request $request,$id){

         $edit_profile = DB::table('bloggers')
         ->where('blogger_id',$id)
         ->first();

         $id = $request->session()->get('user','blogger_id');
        $data= json_decode( json_encode($id), true);

          $username = DB::table('bloggers')
             ->where('blogger_id',$data)
            ->first();

         return view('userdashboard.edit_profile')->with('profile',$edit_profile)->with('username',$username);

    }
    public function edit_profile(editProfileRequest $request,$id){
            $data = [
            
            // 'post_image'=>$url,
            'blogger_email' => $request->edit_email,
            'blogger_password' => $request->edit_password,
            'blogger_name' => $request->edit_username,
            'phone_number' => $request->edit_phonenumber
            
        ];


        DB::table('bloggers')
            ->where('blogger_id',$request->blog_id)
            ->update($data);



            $otherData= [
                'email'=>$request->edit_email,
                'password'=>$request->edit_password,
                'name'=>$request->edit_username
            ];

             DB::table('users')
            ->where('user_id',$request->blog_id)
            ->update($otherData);

            $currentUser = $request->session()->get('user');
            $currentUser->blogger_email = $request->edit_email;
            $currentUser->blogger_name = $request->edit_username;
            


            return redirect()->route('dashboard',['id'=>$id]);
    }




}

    

    



      

   




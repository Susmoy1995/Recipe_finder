<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //

    function admin(){
    	return view('admin.admindashboard');
    }



    function statistics(){


        $totalPost = DB::table('posts')->count();
        $totalBlogger = DB::table('bloggers')->count();  
        $totalBlockedPost = DB::table('posts')->where('post_status','pending')->count();
        $totalBlockedBlogger = DB::table('bloggers')->where('blogger_status','inactive')->count();


        return view('admin.statistics')
        ->with('total_post',$totalPost)
        ->with('total_blogger',$totalBlogger)
        ->with('total_blocked_post',$totalBlockedPost)
        ->with('total_blocked_blogger',$totalBlockedBlogger);
    }

    function bloggerInfo(){

    	$bloggers_info=DB::table('bloggers')
    	->get();
    	
    	return view('admin.blogger_info')->with('blogger',$bloggers_info);	
    }

    function message(){

        $u_message=DB::table('messages')
        ->get();
        
        return view('admin.message')->with('user_message',$u_message);  
    }


// approving post
    function showPostAdmin($id){


        //return redirect()->route('admin.post',['id'=>$id]);

        $user_post_for_admin = DB::table('posts')
        ->join('bloggers','bloggers.blogger_id','=','posts.blogger_id')
        ->where('posts.blogger_id',$id)
        ->get();

        return view('admin.user_post')
        ->with('show',$user_post_for_admin);
    }


    public function gotoApprovePost(Request $request,$id){
         $approving_post = DB::table('posts')
            ->where('post_id', $id)
            ->first();

        return view('admin.approve_post')->with('approve',$approving_post);
    }


     public function update(Request $request,$id)
    {
        $data = [
            'post_status' => 'approve',
            
        ];

        DB::table('posts')
            ->where('post_id', $request->aid)
            ->update($data);

       // return redirect()->route('admin.post',['id'=>$id]);
        //return view('admin.user_post');
            //blog_info
            return redirect()->route('blog_info');

            //return redirect()->route('admin.post',['id'=>$request->aid]);
    }


//block post
    public function gotopost(Request $request,$id){
        // $data = [
        //     'post_status' => 'pending',
            
        // ];

        // DB::table('posts')
        //     ->where('post_id', $request->pos_id)
        //     ->update($data);

      //  return redirect()->route('admin.post',['id'=>$id]);
         $blocking_post = DB::table('posts')
            ->where('post_id', $id)
            ->first();

        return view('admin.block_post')->with('block',$blocking_post);

    }

      public function block_post(Request $request,$id)
    {
         $data = [
            'post_status' => 'pending',
            
        ];

        DB::table('posts')
            ->where('post_id', $request->pos_id)
            ->update($data);

       //return redirect()->route('admin.post',['id'=>$id]);
        return redirect()->route('blog_info');
    }



 //delete post
    public function gotoDeleteBlogger(Request $request,$id){
        $blocking_blogger = DB::table('bloggers')
            ->where('blogger_id', $id)
            ->first();

        return view('admin.delete_blogger')->with('deleteBlogger',$blocking_blogger);
    }

    public function delete_blogger(Request $request,$id){
          DB::table('bloggers')
            ->where('blogger_id', $request->bid)
            ->delete();

             DB::table('posts')
            ->where('blogger_id', $request->bid)
            ->delete();

             DB::table('users')
            ->where('user_id', $request->bid)
            ->delete();

       
            

       //  return redirect()->route('admin.post',['id'=>$id]);
          return redirect()->route('blog_info');
    }


    /// delete blogger

    public function gotoDeletePost(Request $request,$id){
        $blocking_post = DB::table('posts')
            ->where('post_id', $id)
            ->first();

        return view('admin.delete_post')->with('delete',$blocking_post);
    }

    public function delete(Request $request,$id){
          DB::table('posts')
            ->where('post_id', $request->pid)
            ->delete();

       //  return redirect()->route('admin.post',['id'=>$id]);
          return redirect()->route('blog_info');
    }


    ///ban blogger

     public function gotoBlockBlogger(Request $request,$id){
        
         $blocking_blogger = DB::table('bloggers')
            ->where('blogger_id', $id)
            ->first();

        return view('admin.block_blogger')->with('blockBlogger',$blocking_blogger);

    }

      public function block_blogger(Request $request,$id)
    {
         $data = [
            'blogger_status' => 'inactive'
            
         ];



         


        DB::table('bloggers')
            ->where('blogger_id', $request->b_id)
            ->update($data);

        $otherData = [
               'post_status' => 'pending' 
         ];

          DB::table('posts')
            ->where('blogger_id', $request->b_id)
            ->update($otherData);

       //return redirect()->route('admin.post',['id'=>$id]);
        return redirect()->route('blog_info');
    }


    ///unban blogger
    public function gotoUnBlockBlogger(Request $request,$id){
        
         $blocking_blogger = DB::table('bloggers')
            ->where('blogger_id', $id)
            ->first();

        return view('admin.unblock_blogger')->with('unblockBlogger',$blocking_blogger);

    }

      public function unblock_blogger(Request $request,$id)
    {
         $data = [
            'blogger_status' => 'active'
            
        ];

        DB::table('bloggers')
            ->where('blogger_id', $request->bl_id)
            ->update($data);


            $otherData = [
                  'post_status'=>'approve'  
            ];

            DB::table('posts')
            ->where('blogger_id', $request->bl_id)
            ->update($otherData);

       //return redirect()->route('admin.post',['id'=>$id]);
        return redirect()->route('blog_info');
    }

    ///watching comments
    public function showComments(Request $request,$id){
        
        $comments = DB::table('comments')
        ->join('bloggers','bloggers.blogger_id','=','comments.blogger_id')
        ->where('post_id',$id)
        ->get();
     
        return view('admin.comments')->with('comment',$comments);


    }

    public function gotoDeleteComments(Request $request,$id){
        $delete_comments = DB::table('comments')
        ->join('bloggers','bloggers.blogger_id','=','comments.blogger_id')
        ->where('comment_id',$id)
        ->first();

        return view('admin.delete_comments')->with('comment',$delete_comments);
    }

     public function deleting_comments(Request $request,$id){
          DB::table('comments')
            ->where('comment_id', $request->cd_id)
            ->delete();


      

        // return redirect()->route('delete.comments',['id'=>$id]);
          return redirect()->route('blog_info');
    }


}

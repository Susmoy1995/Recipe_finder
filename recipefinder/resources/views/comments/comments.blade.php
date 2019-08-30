@extends('layouts.default')


@section('title')
   {{$single_post->post_title}}
@endsection

@section('username')
{{$username->blogger_name}}
@endsection

@section('content1')
 <div class="container">
   <!-- post -->
     
@if(!empty($single_post))
 
     <img id="post_thumbnail" src="{{$single_post->post_image}}" class="img-responsive" alt="Responsive image" style="height: 300px;width:500px">
     <h2>{{$single_post->post_title}}</h2>
    <p>by <a href="{{route('userprofile',['id'=>$single_post->blogger_id])}}">{{$single_post->blogger_name}}</a>  time:{{$single_post->time}}</p>
    
      <div class="form-group">
        <p>
          {{$single_post->post}}
        </p>
  
       </div>

        

     @if(session('user') || session('admin_info'))
      <div class="form-group">
        <h3>Reviews</h3>
        <form method="post" action="{{route('comments',['id'=>$single_post->post_id])}}">

          {{csrf_field()}}
          <textarea name="comments" class="form-control" style="border-radius: 10px" placeholder="write a review"></textarea>
              <br>

              @if(session('user'))
              <input type="hidden" name="blog_id" value="{{session('user')->blogger_id}}">
              @else
              <input type="hidden" name="blog_id" value="{{session('admin_info')->admin_id}}">
              @endif
              <input type="hidden" name="p_id" value="{{$single_post->post_id}}">
              <input type="submit" value="post" class="btn btn-success">
        </form>
  
       </div>

        @else
            <p style="color: red">*you are not authorized for giving reviews. you need to create an account</p> 
       @endif

      <p hidden>
        {{$get = DB::table('comments')
       ->join('bloggers','bloggers.blogger_id','=','comments.blogger_id')
       ->where('post_id',$single_post->post_id)->get()}}


       {{$getValue = DB::table('comments')
       ->join('admins','admins.admin_id','=','comments.blogger_id')
       ->where('post_id',$single_post->post_id)->get()}}
      </p>
       

       <!-- posted comment view  -->
       @foreach($get as $value)
       <h3>{{$value->blogger_name}} </h3>
      
     
            {{$value->comment}} 


       @endforeach


       @foreach($getValue as $value)
       <h3 style="color:#4286f4">{{$value->admin_email}} </h3>
      
     
            <p style="color:#4286f4">{{$value->comment}}</p> 


       @endforeach

      

       


      
       
  </div>

  @endif

   <div>
     <br>
     <br>
     <br>

   </div>
         
         
         
          
@endsection
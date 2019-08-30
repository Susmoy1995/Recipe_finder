@extends('layouts.default')


@section('title')
{{$single_post->post_title}}
@endsection




@section('content1')
<!-- post -->
     

 <div class="container">
     <img id="post_thumbnail" src="{{$single_post->post_image}}" class="img-responsive" alt="Responsive image" style="height: 300px;width:500px" >
     <h2>{{$single_post->post_title}}</h2>

     <p>by <a href="{{route('userprofile',['id'=>$single_post->blogger_id])}}">{{$single_post->blogger_name}}</a>  time:{{$single_post->time}}</p>
      <p></p>
    
      <div class="form-group">
        <p>{{$single_post->post}}</p>
  
       </div>

         <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-thumbs-up"></span> Like
                          </button>
                            <!-- <a href="{{route('impv')}}" class="btn btn-link">improve that post</a> -->
                           <a href="{{route('comments',['id'=>$single_post->post_id])}}" class="btn btn-link">reviews</a>
 
   </div>

   <div>
     <br>
     <br>
     <br>

   </div>

@endsection
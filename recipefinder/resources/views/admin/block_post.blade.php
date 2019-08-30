@extends('layouts.default')

@section('title')
    block post
@endsection


@section('content1')

     <img id="post_thumbnail" src="{{$block->post_image}}" class="img-responsive" alt="Responsive image"
     style="height: 300px;width:500px">
     <h2>{{$block->post_title}}</h2>
    <p>time:{{$block->time}}</p>
    
      <div class="form-group">
        <p>
          {{$block->post}}
        </p>
  
       </div>



          <form method="post">
            {{csrf_field()}}
              <input type="hidden" name="pos_id" value="{{$block->post_id}}">
               <button type="submit" class="btn btn-danger">Block this post</button>
          </form>

          <br>
          <br>
@endsection

@extends('layouts.default')

@section('title')
    delete post
@endsection


@section('content1')

     <img id="post_thumbnail" src="{{$delete->post_image}}" class="img-responsive" alt="Responsive image"
     style="height: 300px;width:500px">
     <h2>{{$delete->post_title}}</h2>
    <p>time:{{$delete->time}}</p>
    
      <div class="form-group">
        <p>
          {{$delete->post}}
        </p>
  
       </div>



          <form method="post">
            {{csrf_field()}}
              <input type="hidden" name="pid" value="{{$delete->post_id}}">
               <button type="submit" class="btn btn-danger">delete this post</button>
          </form>

          <br>
          <br>
@endsection

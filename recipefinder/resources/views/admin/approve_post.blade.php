@extends('layouts.default')

@section('title')
   approving post
@endsection


@section('content1')

     <img id="post_thumbnail" src="{{$approve->post_image}}" class="img-responsive" alt="Responsive image"
     style="height: 300px;width:500px">
     <h2>{{$approve->post_title}}</h2>
    <p>time:{{$approve->time}}</p>
    
      <div class="form-group">
        <p>
          {{$approve->post}}
        </p>
  
       </div>



          <form method="post">
            {{csrf_field()}}
              <input type="hidden" name="aid" value="{{$approve->post_id}}">
               <button type="submit" class="btn btn-success">approve this post</button>
          </form>

          <br>
          <br>
@endsection

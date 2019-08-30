@extends('layouts.default')

@section('title')
   delete comments
@endsection


@section('content1')

            
           <h3>blogger name : {{$comment->blogger_name}}</h3>  <br>
            <p>comment : {{$comment->comment}}</p>
            <br>
            <br>
            <br>
            <form method="post">
        		{{csrf_field()}}
        	   <input type="hidden" name="cd_id" value="{{$comment->comment_id}}">
        	   <button type="submit" class="btn btn-danger">delete the comment</button>
        		
        	</form>
@endsection
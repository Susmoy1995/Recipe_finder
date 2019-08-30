@extends('layouts.default')

@section('title')
    delete blogger
@endsection


@section('content1')
      
      <h2>{{$deleteBlogger->blogger_name}}'s information </h2>
      <p>Name : {{$deleteBlogger->blogger_name}} </p>
      <p>email : {{$deleteBlogger->blogger_email}}</p>
      <p>password : {{$deleteBlogger->blogger_password}}</p>
      <p>phone number : {{$deleteBlogger->phone_number}}</p>
    
          <br>
          <br><br>
          <br>

          <h3>Are you sure?</h3>
        
          <form method="post">
            {{csrf_field()}}
              <input type="hidden" name="bid" value="{{$deleteBlogger->blogger_id}}">
              
               <button type="submit" class="btn btn-danger">delete this blogger</button>
          </form>
          <br>
          <br>
          <a href="{{route('blog_info')}}" class="btn btn-primary">no thanks</a>

          <br>
          <br>
@endsection

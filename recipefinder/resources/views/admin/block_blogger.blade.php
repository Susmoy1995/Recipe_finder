@extends('layouts.default')

@section('title')
    block blogger
@endsection


@section('content1')
      
      <h2>{{$blockBlogger->blogger_name}}'s information </h2>
      <p>Name : {{$blockBlogger->blogger_name}} </p>
      <p>email : {{$blockBlogger->blogger_email}}</p>
      <p>password : {{$blockBlogger->blogger_password}}</p>
      <p>phone number : {{$blockBlogger->phone_number}}</p>
    
          <br>
          <br><br>
          <br>

          <h3>Are you sure?</h3>
          <form method="post">
            {{csrf_field()}}
              <input type="hidden" name="b_id" value="{{$blockBlogger->blogger_id}}">
               <button type="submit" class="btn btn-danger">block this blogger</button>
          </form>
          <br>
          <br>
          <a href="{{route('blog_info')}}" class="btn btn-primary">no thanks</a>

          <br>
          <br>
@endsection

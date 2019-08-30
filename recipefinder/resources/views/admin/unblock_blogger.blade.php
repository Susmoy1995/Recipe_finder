@extends('layouts.default')

@section('title')
    unblock blogger
@endsection


@section('content1')
      
      <h2>{{$unblockBlogger->blogger_name}}'s information </h2>
      <p>Name : {{$unblockBlogger->blogger_name}} </p>
      <p>email : {{$unblockBlogger->blogger_email}}</p>
      <p>password : {{$unblockBlogger->blogger_password}}</p>
      <p>phone number : {{$unblockBlogger->phone_number}}</p>
    
          <br>
          <br><br>
          <br>

          <h3>Are you sure?</h3>
          <form method="post">
            {{csrf_field()}}
              <input type="hidden" name="bl_id" value="{{$unblockBlogger->blogger_id}}">
               <button type="submit" class="btn btn-success">unblock this blogger</button>
          </form>
          <br>
          <br>
          <a href="{{route('blog_info')}}" class="btn btn-primary">no thanks</a>

          <br>
          <br>
@endsection

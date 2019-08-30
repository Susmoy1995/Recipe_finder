@extends('layouts.default')

@section('title')
	Edit Profile
@endsection


@section('username')
 {{$username->blogger_name}}
@endsection


@section('content1')
            
             <div class="col-sm-4"></div>
             <div class="col-sm-4">
             	<form class="form-signin" method="post">
                  {{csrf_field()}}

                
                  <h2>Edit Profile</h2>

                  <input type="hidden" name="blog_id" value="{{$profile->blogger_id}}">
            
                  <input type="text"  name="edit_email" class="form-control" placeholder="Email address" value="{{$profile->blogger_email}}"> 
                  <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('edit_email')}}
                  @endif

                  </p>
                  <br>
                 
                  <input type="text"  name="edit_password" class="form-control" placeholder="Password" value="{{$profile->blogger_password}}">
                   <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('edit_password')}}
                  @endif

                  </p><br>

                   <input type="text" name="edit_username" class="form-control" placeholder="username" value="{{$profile->blogger_name}}"> 
                    <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('edit_username')}}
                  @endif

                  </p><br>
              
                  <input type="text" name="edit_phonenumber" class="form-control" placeholder="phonenumber" value="{{$profile->phone_number}}">
                   <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('edit_phonenumber')}}
                  @endif

                  </p><br>

                  
               
                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="save"> <br>

           
                  
                
                  
           </form>
             </div>

              <div class="col-sm-4"></div>
@endsection
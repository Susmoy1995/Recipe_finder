@if(session('user'))
@extends('layouts.default')


@section('title')
  {{$profileValue->blogger_name}}
@endsection

@section('username')
 {{$profileValue->blogger_name}}
  
@endsection



@section('content1')

 
<div class="container">

  
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Profile</a></li>
    <li><a data-toggle="pill" href="#menu1">My Posts</a></li>
    <li><a data-toggle="pill" href="#menu4">create Posts</a></li>
    
    
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <!-- profile -->
      <h3>PROFILE</h3>

      <p>Name : {{$profileValue->blogger_name}} </p>
      <p>email : {{$profileValue->blogger_email}}</p>
      <p>password : {{$profileValue->blogger_password}}</p>
      <p>phone number : {{$profileValue->phone_number}}</p>

      <a href="{{route('edit.profile',['id'=>session('user')->blogger_id])}}" class="btn btn-warning">edit profile</a>
    </div>
    <div id="menu1" class="tab-pane fade">
      <!-- show all posts from author -->
      <h3>MY POSTS</h3>

            

          
            @foreach($singlePost as $value)


            <div class="jumbotron" >
                  <div class="container">
                    <div class="col-sm-6">
                 <img id="post_thumbnail" src="{{$value->post_image}}" alt="..." class="img-thumbnail img-responsive" height="auto" width="auto" style="height: 300px;width:400px" 
              >
              </div>


              <div class="col-sm-6">
                     <h3>{{$value->post_title}}</h3>
              <p style="font-size: 15px">by <a href="#">{{$value->blogger_name}}</a> {{$value->time}}
                   <span class="badge badge-pill badge-primary">{{$value->post_status}}</span>
              </p>

              <p>
               
                <a href="{{route('delete.blogger.post',['id'=>$value->post_id])}}" class="btn btn-danger">delete post</a>
                <a href="{{route('edit.post',['id'=>$value->post_id])}}" class="btn btn-primary">edit post</a>
              </p>
              <div > 
                <p style="font-size: 15px;line-height:1.2em; height:3.6em;overflow:hidden;">
                     {{$value->post}}
                </p>
              </div>

                <a  href="{{route('title',['id' => $value->post_id])}}">Learn more</a> <br><br>
             
             
               <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-thumbs-up"></span> Like
                          </button>
                   
                           <a href="{{route('comments',['id'=>$value->post_id])}}" class="btn btn-link">reviews</a>

              </div>
                  </div>
              
             



             

              
            </div>
            @endforeach

            
          <div class="pagination">
                 {{ $singlePost->fragment('value')->links() }}
          </div>
        
           

             
                         
      
    </div>
    
   

     <div id="menu4" class="tab-pane fade">

      <div class="col-sm-8">
         <h3>CREATE POST</h3>

      <!-- creating post into the blog -->
      <div class="form-group">
            <form  enctype='multipart/form-data' method="post" action="/userdashboard" >

              {{csrf_field()}}
              <input type="file" name="image" class="btn btn-primary"> 
              @if($errors->any())
                  <p style="color:red">  {{$errors->first('image')}}</p>
                  @endif

                  <br>
             <input type="hidden" name="b_id" value="{{session('user')->blogger_id}}">
             <input type="text" name="title" class="form-control" placeholder="post title" style="width:700px"> 

              @if($errors->any())
                    <p style="color:red">{{$errors->first('title')}}</p>
                  @endif

                  <br>


             <textarea name="post_desc" style="border-radius: 10px;height:200px;width:700px" placeholder="write your post"></textarea>
              

               @if($errors->any())
                   <p style="color:red">{{$errors->first('post_desc')}}</p> 
                  @endif

                  <br>

                  <br>

              <input type="submit" value="post" class="btn btn-success">
          
                  
           </form>

      </div>

      </div>
      <div class="col-sm-4">
        <br>
        <br>
        <br>
        <!-- uploading image -->
        
      </div>
     
       
    </div>
    
  </div>
</div>




@endsection

 
@else
       @include('login.login');
    @endif










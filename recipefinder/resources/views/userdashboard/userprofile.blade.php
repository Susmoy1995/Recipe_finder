@extends('layouts.default')


@section('title')
 userprofile
@endsection

@section('username')
 {{$username->blogger_name}}
@endsection



@section('content1')

  @foreach($post as $username)
      <h3>{{$username->blogger_name}}</h3>
      <p>email id :{{$username->blogger_email}}</p>


      @break
   @endforeach
   
   <br>
  <br>
  <br>

     @foreach($post as $username)
      <h4 style="color:#4286f4">{{$username->blogger_name}}'s all posts</h3>
 
      @break
   @endforeach
  

   <hr>

   @foreach($post as $value)
      <div class="jumbotron" >

              <div class="container">
                <div class="col-sm-6">
                   <img id="post_thumbnail" src="{{$value->post_image}}" alt="..." class="img-thumbnail img-responsive" height="auto" width="auto" style="height: 200px;width:600px">
                </div>

                  <div class="col-sm-6">
                             
              <a href="{{route('title',['id' => $value->post_id])}}"><h3>{{$value->post_title}}</h3></a>
               <p style="font-size: 15px">by <a href="{{route('userprofile',['id'=>$value->blogger_id])}}">{{$value->blogger_name}}</a> {{$value->time}}</p>
                   <p></p>
              <div > 
                <p style="line-height:1.2em; height:3.6em;overflow:hidden; font-size: 15px">
                    {{$value->post}}
                </p>
              </div>
             
              <a  href="{{route('title',['id' => $value->post_id])}}">Learn more</a> <br><br>

              
               <a href="" type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-thumbs-up"></span> Like
                          </a>

    
                       
                       
                          
                           <!-- <a href="{{route('impv')}}" class="btn btn-link">improve that post</a> -->
                           <a href="{{route('comments',['id' => $value->post_id])}}" class="btn btn-link">reviews</a>
                  </div>
              </div>

             
            </div>
   @endforeach


    <div class="pagination">
             {{ $post->fragment('value')->links() }}
    </div>






   

@endsection
@extends('layouts.default')


@section('title')
recipe finder
@endsection


@if(session('user'))
@section('username')
   {{session('user')->blogger_name}}
@endsection


@endif



@section('search')
   <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="search" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-success">search</button>
      </form>

@endsection      


@section('content1')

       <div class="col-sm-8">

      <h2>Reciepe posts</h2>
      
      
       @foreach($blogger_post as $key =>$value)


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


             <!-- like -->
                         
        @endforeach

          <div class="pagination">
                 {{ $blogger_post->fragment('value')->links() }}
          </div>
       

    </div>
@endsection

@section('content2')
<div class="col-sm-4">
      <div class="panel-group" id="accordion">

 

              <h2>Trending 5 posts</h2>
              <div class="list-group">
                  
          <?php $i = 0; ?>
                   
                  @foreach($result as $value)
                    <a href="{{route('title',['id' => $value->post_id])}}" class="list-group-item">{{$value->post_title}}</a>
                     <?php $i++;
                        if($i == 5){
                          break;
                        }
                      ?>
                  @endforeach
              </div>

            <div class="jumbotron">
               <div class="form-group">
                     <h3>Contact us</h3>
                     <!-- contact form -->
                    <form method="post" action="/">
               
                     {{csrf_field()}}
                    
                     <input type="Email" name="cont_email" class="form-control" placeholder="Email address"> <br>
                     @if($errors->any())
                    <p style="color:red;font-size: 15px">{{$errors->first('cont_email')}}</p>
                    <br>
                  @endif
                     <textarea name="post_message" class="form-control" style="border-radius: 10px;height:150px" placeholder="write your message"></textarea>
                      

                      @if($errors->any())

                   <p style="color:red;font-size: 15px">{{$errors->first('post_message')}}</p> 
                   <br>

                  @endif
                      <br>
                      <input type="submit" value="send" class="btn btn-primary">
                  
                          
                   </form>

             </div>
              </div>
                
               


        </div>
      
    </div>
@endsection


@section('footer')
<!-- Footer -->
  <div style="background: #468cfc;color:white" >
    <footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h3 class="text-uppercase">Follow us on social networks</h3>
          
            <a href="http://www.facebook.com" target="_blank" style="text-decoration:none;color:white;padding-right: 20px">   <i class="fa fa-facebook"></i> </a>
                  <a href="http://www.youtube.com" target="_blank" style="text-decoration:none;color:white;padding-right: 20px">   <i class="fa fa-youtube"></i> </a>            
                  <a href="http://www.twitter.com" target="_blank" style="text-decoration:none;color:white;padding-right: 20px">   <i class="fa fa-twitter"></i> </a>
                  <a href="http://www.pinterest.com" target="_blank" style="text-decoration:none;color:white;padding-right: 20px">   <i class="fa fa-pinterest"></i> </a>
                  <a href="http://www.linkedin.com" target="_blank" style="text-decoration:none;color:white;padding-right: 20px">   <i class="fa fa-linkedin"></i> </a>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3">

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3" > 

            <!-- Links -->
            <h5 class="text-uppercase">Useful links</h5>

            <ul class="list-unstyled" >
              <li>
                <a href="#!" style="color: white">food spotting</a>
              </li>
              <li>
                <a href="#!" style="color: white">food panda</a>
              </li>
              <li>
                <a href="#!" style="color: white">food bank</a>
              </li>
              <li>
                <a href="#!" style="color: white">food bloger</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-3">

            <!-- Links -->
            <h5 class="text-uppercase">contact us</h5>

            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            
                <p>
                    <i class="fa fa-envelope mr-3"></i> reciepefinder@gmail.com</p>
                <p>
                    <i class="fa fa-phone mr-3"></i> +088 01823442344</p>
                <p>
                    <i class="fa fa-print mr-3"></i> +088 01743525423 </p>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" >© 2018 Copyright:
      <a href="#" style="color: white"> reciepefinder.com</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
  </div>



@endsection
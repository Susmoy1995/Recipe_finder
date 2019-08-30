 @extends('layouts.default')

 @section('title')
    admin
@endsection

@section('content3')


 <ul id="admin_nav">
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('stat')}}">statistics</a></li>
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('blog_info')}}">blogger information </a></li>
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('user.message')}}">message </a></li>
    </ul>



   
 
  

   <div class="container">
   <h1>statistics</h1>


    <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Total Posts</h3>
        
        <p  style="font-size: 40px" class="badge badge-primary">{{$total_post}}</p>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Total bloggers</h3>
        
        <p  style="font-size: 40px" class="badge badge-primary">{{$total_blogger}}</p>
      </div>
    </div>
  </div>
</div>
<br>
<br>

 <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Total blocked posts</h3>
        
        <p  style="font-size: 40px" class="badge badge-danger">{{$total_blocked_post}}</p>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Total blocked bloggers</h3>
        
        <p  style="font-size: 40px" class="badge badge-danger">{{$total_blocked_blogger}}</p>
      </div>
    </div>
  </div>
</div>


      
     
   </div> 
   

</div>


@endsection  
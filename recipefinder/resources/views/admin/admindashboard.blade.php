@extends('layouts.default')




@section('content3')



<div class="col-sm-2">
 
 
  <ul class="nav nav-pills nav-stacked">
    <li class="active"><a data-toggle="pill" href="#home">Statistics</a></li>
    <li><a data-toggle="pill" href="#menu1">blogger information</a></li>
    <li><a data-toggle="pill" href="#menu2">Messages</a></li>
    <li><a data-toggle="pill" href="#menu3">create notification</a></li>
    <li><a data-toggle="pill" href="#menu4">edit profile</a></li>
  </ul>
  
  



</div>

<div class="col-sm-10">
  
  
    <div id="home" class="tab-pane fade in active">
      <h3>Statistics</h3>
     
       <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Total posts</h5>
          <h6 class="card-subtitle mb-2 text-muted">200</h6>
         
        </div>



      </div>



        <div class="card" style="width: 18rem;" style="border-style:solid;border-width: 2px;">
        <div class="card-body">
          <h5 class="card-title">Total posts</h5>
          <h6 class="card-subtitle mb-2 text-muted">200</h6>
         
        </div>


        
      </div>

    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>All posts</h3>
     
      <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        
        <th>blogger name</th>
        <th>email</th>
        <th>password</th>
        <th>phone number</th>
        
        <th>status</th>
        <th>posts</th>
        <th>erase</th>
        <th>edit</th>
      </tr>
    </thead>
    <tbody>

      @foreach($blogger as $value)
      <tr>
       
        <td>{{$value->blogger_name}}</td>
        <td>{{$value->blogger_email}}</td>
        <td>{{$value->blogger_password}}</td>
        <td>{{$value->phone_number}}</td>
        <td>
            pending
        </td>
        <td><button class="btn btn-primary glyphicon glyphicon-pencil"></button></td>    
        <td><button class="btn btn-danger glyphicon glyphicon-remove"></button></td>
        <td><button class="btn btn-primary glyphicon glyphicon-pencil"></button></td>
      </tr>
      @endforeach



    </tbody>
  </table>
  </div>



    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>

    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>

    <div id="menu4" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>

  </div>
</div>

</div>
 

@endsection


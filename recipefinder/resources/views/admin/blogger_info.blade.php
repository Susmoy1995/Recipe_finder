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
      <h1>blogger information</h1>

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
        
        
        <th>block</th>
        <th>unblock</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>

      @foreach($blogger as $value)
      <tr>
       
        <td>{{$value->blogger_name}}</td>
        <td>{{$value->blogger_email}}</td>
        <td>{{$value->blogger_password}}</td>
        <td>{{$value->phone_number}}</td>
        <td>{{$value->blogger_status}}</td>  
       
        <td><a href="{{route('admin.post',['id'=>$value->blogger_id])}}" class="btn btn-primary glyphicon glyphicon-pencil"></a></td>  


       
        <td><a href="{{route('block.blogger',['id'=>$value->blogger_id])}}" class="btn btn-danger glyphicon glyphicon-ban-circle"></a></td>


        <td><a href="{{route('unblock.blogger',['id'=>$value->blogger_id])}}"class="btn btn-success glyphicon glyphicon-ok"></a></td>


         <td><a href="{{route('delete.blogger',['id'=>$value->blogger_id])}}"class="btn btn-danger glyphicon glyphicon-trash"></a></td>
        
      </tr>
      @endforeach



    </tbody>
  </table>
  </div>


   </div>


@endsection  
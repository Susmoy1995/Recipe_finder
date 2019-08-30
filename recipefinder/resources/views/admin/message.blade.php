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



   <div>
   <div class="container">
      <h1>message</h1>

	  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        
        <th>email</th>
        <th>message</th>
        <th>reply</th>
        
      </tr>
    </thead>
    <tbody>

      @foreach($user_message as $value)
      <tr>
       
        <td>{{$value->email}}</td>
        <td>{{$value->message}}</td>
        <td><button class="btn btn-primary glyphicon glyphicon-comment"></button></td>
       
      </tr>
      @endforeach



    </tbody>
  </table>
  </div>	






   </div> 
   

</div>


@endsection  
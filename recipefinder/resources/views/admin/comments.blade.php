@extends('layouts.default')

@section('title')
   comments
@endsection


@section('content3')


  
     <ul id="admin_nav">
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('stat')}}">statistics</a></li>
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('blog_info')}}">blogger information </a></li>
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('user.message')}}">message </a></li>
    </ul>


 



 <div class="container">
      <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        
         <th>blogger name</th>
        <th>Comment</th>
       
        
      
       
     
        <th>remove comment</th>
       
      </tr>
    </thead>
    <tbody>
      
      @foreach($comment as $value)
      <tr>


       
        <td>{{$value->blogger_name}}</td>
         <td>{{$value->comment}}</td>
        

        </td>
        <td>
          
         <a href="{{route('delete.comments',['id'=>$value->comment_id])}}" class="btn btn-danger glyphicon glyphicon-trash"></a>
            
          
        </td>
        <td>
       

      </tr>
      @endforeach



    </tbody>
  </table>
  </div>  
 </div>

	
	

@endsection




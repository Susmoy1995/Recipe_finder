@extends('layouts.default')

@section('title')
    user post
@endsection



@section('content3')
 
 



 


       <ul id="admin_nav">
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('stat')}}">statistics</a></li>
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('blog_info')}}">blogger information </a></li>
     <li style="list-style: none; display: inline-block;"><a class="btn btn-primary" href="{{route('user.message')}}">message </a></li>
    </ul>

    <div class="container">


      @foreach($show as $blogger)
        
          <h3>{{$blogger->blogger_name}}'s post</h3> 
           @break
  @endforeach


       <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>


            
      
            <th>posts title</th>
           
            
          
            <th>post body</th>
            <th>time</th>
            <th>status</th>
            <th>all comments</th>
            <th>approval</th>

            <th>delete post</th>
            <th>block post</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($show as $value)
          <tr>


           
            <td>{{$value->post_title}}</td>
            <td cellpadding="100px">{{$value->post}}</td>
            <td>{{$value->time}}</td>
            <td>
              <span class="badge badge-pill badge-primary">{{$value->post_status}}</span>
            </td>
           
         
            <td><a href="{{route('admin.comments',['id'=>$value->post_id])}}" class="btn btn-primary glyphicon glyphicon-comment"></a></td>
            <td>
             

              <a href="{{route('approve.post',['id'=>$value->post_id])}}" class="btn btn-success glyphicon glyphicon-ok"></a></td>
              
            </td>
            <td><a href="{{route('delete.post',['id'=>$value->post_id])}}" class="btn btn-danger glyphicon glyphicon-trash"></a></td>
            <td>
             

               <a href="{{route('block.post',['id'=>$value->post_id])}}" class="btn btn-danger glyphicon glyphicon-ban-circle"></a>
             
            </td>



          </tr>

      @endforeach

    



    </tbody>
  </table>
  </div>
    </div>

 
  
 

 



@endsection
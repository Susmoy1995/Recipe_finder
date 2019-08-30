@extends('layouts.default')

@section('title')
 edit post
@endsection

@section('username')
 {{$username->blogger_name}}
@endsection



@section('content1')


  <h1>Edit post</h1>
  <form  enctype='multipart/form-data' method="post">

              {{csrf_field()}}

          
            <br>
               

            <br>
             <input type="hidden" name="ep_id" value="{{$edit->post_id}}">
             <input type="text" name="edit_title" class="form-control" placeholder="post title" style="width:700px" value="{{$edit->post_title}}"> 

               
                  <br>
                   <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('edit_title')}}
                  @endif

                  </p>


             <textarea name="edit_post_desc" style="border-radius: 10px;height:200px;width:700px" placeholder="write your post" >{{$edit->post}}</textarea>
           <br>
                  <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('edit_post_desc')}}
                  @endif

                  </p>
                  
                  

                  <br>



              <input type="submit" value="save" class="btn btn-success">
          
                  
           </form>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Log in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
       <link rel="shortcut icon" href="img/apple.png" />
</head>
<body>


    <div class="container">

      <div class="col-sm-4"></div>
      <div class="col-sm-4" style="margin-top:150px">
        
                  @if(session('reg'))
                  <h3 style="color:#3cb24a">you are registered now</h3>
                  @endif 
            <form class="form-signin" method="post" action="{{route('dashboard')}}">
                  

                
                  
                  {{csrf_field()}}

                  <h2>Log in here</h2>
            
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="useremail" value="{{old('useremail')}}"> 
                  <p style="color:red">
                  @if($errors->any())
                    {{$errors->first('useremail')}}
                  @endif

                  </p>
                  

                  <br>
                 
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">

                  <p style="color:red">
                        @if($errors->any())
                    {{$errors->first('password')}}
                  @endif
                  </p>
               

                  <br>
                  <p style="color:red">
                    @if(session('message'))
                    {{session('message')}}
                    @endif

                   </p>

                 
                  
                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="login">
           </form>

             <a style="text-align: center;" href="{{route('signinview')}}" class="btn btn-link">not registered yet</a>
             <a style="text-align: center;" href="/" class="btn btn-link">back to home page</a>

      </div>
      <div class="col-sm-4"></div>

     

    </div> <!-- /container -->




 
</body>
</html>
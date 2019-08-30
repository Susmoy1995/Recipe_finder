<!DOCTYPE html>
<html lang="en">
<head>
  <title>Resigtration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
       <link rel="shortcut icon" href="img/apple.png" />

       <script type="text/javascript">

         function confirmed(){
            alert('registration confirmed');
         }
       </script>
</head>
<body>


    <div class="container">

      <div class="col-sm-4"></div>
      <div class="col-sm-4" style="margin-top:120px">
        
            <form class="form-signin" method="post" action="/sign in">
                  {{csrf_field()}}

                
                  <h2>sign up here</h2>
            
                  <input type="email"  name="email" class="form-control" placeholder="Email address" value="{{old('email')}}"> 
                  <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('email')}}
                  @endif

                  </p>
                  <br>
                 
                  <input type="password"  name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
                   <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('password')}}
                  @endif

                  </p><br>

                   <input type="text" name="username" class="form-control" placeholder="username" value="{{old('username')}}"> 
                    <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('username')}}
                  @endif

                  </p><br>
              
                  <input type="text" name="phonenumber" class="form-control" placeholder="phonenumber" value="{{old('phonenumber')}}">
                   <p style="color:red">
                     @if($errors->any())
                    {{$errors->first('phonenumber')}}
                  @endif

                  </p><br>

                  
               
                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="submit"> <br>

           
                  
                
                  
           </form>

            <a style="text-align: center;" href="{{route('loginview')}}" class="btn btn-link">i already have an account</a>

      </div>
      <div class="col-sm-4"></div>

     

    </div> <!-- /container -->




 
</body>
</html>
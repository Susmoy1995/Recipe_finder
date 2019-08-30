<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="shortcut icon" href="img/apple.png" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>

      @include('post_design')


    <link href="custom_css/style.css" rel="stylesheet">

</head>
<body>



<!-- navigation bar -->
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Recipe finder</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        
      </ul> -->

      @yield('search')
      <ul class="nav navbar-nav navbar-right">
        <li>
        @if(session('user'))
        <a href="{{route('userdashboard',['id'=>session('user')->blogger_id])}}">{{session('user')->blogger_name}}

         


        </a></li>
        <li><a href="/logout">log out</a></li>
        @endif

         @if(session('admin_info'))
        <li><a href="{{route('stat')}}">admin</a></li>
        <li><a href="/logout">log out</a></li>
        @endif





        @if(!session('user') && !session('admin_info'))
        <li><a href="{{route('loginview')}}">log in</a></li>
        <li><a href="{{route('signinview')}}">sign up</a></li>
        @endif
       <!--  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> -->
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- navigation bar end -->


 

  <!-- whole page layout -->
  
  <div class="container">

    <!-- all post in left center side -->
       @yield('content1')
     <!-- all post in left center side  end-->


    <!-- trending post in right side  -->

    @yield('content2')

    <!-- trending post in right side end -->
  
      
    
  </div>


   @yield('content3')

  <!-- whole page layout end -->



  <!-- Footer -->

  @yield('footer')

   




 
</body>
</html>
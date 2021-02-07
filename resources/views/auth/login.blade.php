{{-- @extends('layouts.app')

@section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <link rel="icon" href="{{ url('images/fav/fav.png') }}" type="image/png" sizes="16x16"> 
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login Page | CCIE Lab Center</title>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <!-- Bootstrap CSS -->
  <link href="{{url('Admin/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{{url('Admin/css/bootstrap-theme.css')}}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{{url('Admin/css/elegant-icons-style.css')}}" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="{{url('Admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
  <link href="{{url('Admin/assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="{{url('Admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="{{url('Admin/css/owl.carousel.css')}}" type="text/css">
  <link href="{{url('Admin/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{url('Admin/css/fullcalendar.css')}}">
  <link href="{{url('Admin/css/widgets.css')}}" rel="stylesheet">
  <link href="{{url('Admin/css/style.css')}}" rel="stylesheet">
  <link href="{{url('Admin/css/style-responsive.css')}}" rel="stylesheet" />
  <link href="{{url('Admin/css/xcharts.min.css')}}" rel=" stylesheet">
  <link href="{{url('Admin/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  {{-- @yield('style') --}}
</head>
<body class="login-img3-body">

    <div class="container">
  
      <form class="login-form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="login-wrap">
          <p class="login-img"><i class="icon_lock_alt"></i></p>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_profile"></i></span>
            <input {{ $errors->has('email') ? ' has-error' : '' }} name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Email Address" autofocus="" required>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong style="color: red">{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="input-group">
            <span class="input-group-addon"><i class="icon_key_alt"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <label class="checkbox">
                  {{-- <input type="checkbox" value="remember-me" {{ old('remember') ? 'checked' : '' }}> Remember me --}}
                  {{-- <span class="pull-right"> <a href="{{ route('password.request') }}"> Forgot Password?</a></span> --}}
              </label>
          <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
          {{-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> --}}
        </div>
      </form>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <div class="text-right">
        <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
            Designed by <a href="https://www.simplylearnanything.com" target="_blank">Simply Learn Anything</a>
          </div>
      </div>
    </div>
  
  
    <script async="" src="//www.google-analytics.com/analytics.js"></script><script>if( window.self == window.top ) { (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-55234356-4', 'auto'); ga('send', 'pageview'); } </script>
  
  
  
  </body>



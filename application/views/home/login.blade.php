<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Laravel Todo app with Backbonejs.</title>
  <meta name="viewport" content="width=device-width">
  {{ HTML::style('css/style.css') }}
</head>
<body>
<section class="main">

  {{ Form::open('home/login', 'POST', array('class'=>'form-2')); }}
    @if (Session::has('login_errors'))
        <h2 style="color:red">Username or password incorrect.</h2>
    @endif

    @if (Session::has('success_message'))
        <h2 style="color:green">Account created Successfully, please log in now</h2>
    @endif

    @if (Session::has('logout_message'))
        <h2 style="color:green">You have been logged out</h2>
    @endif
    <h1><span class="log-in">Log in</span> or <span class="sign-up">sign up</span></h1>
    {{ Form::token() }}
    <p class="float">
      <label for="login"><i class="icon-user"></i>Username</label>
      {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username'));}}
    </p>
    <p class="float">
      <label for="password"><i class="icon-lock"></i>Password</label>
      {{ Form::password('password', array('placeholder' => 'Password'));}}
      <label for="remember">Remember Me {{ Form::checkbox('remember', 'Remember Me');}}
      </label>
    </p>
    <p class="clearfix"> 
      <a href="{{ url('home/new')}}" class="log-twitter">Sign up</a>    
      {{ Form::submit('Login');}}

    </p>
  {{ Form::close() }}
</section>

  </body>
</html>
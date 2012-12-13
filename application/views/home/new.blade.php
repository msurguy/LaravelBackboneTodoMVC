<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Create new user | Laravel Todo app with Backbonejs.</title>
  <meta name="viewport" content="width=device-width">
  {{ HTML::style('css/style.css') }}
</head>
<body>
<section class="main">
  {{ Form::open('home/new', 'POST', array('class'=>'form-2')); }}
    {{ $errors->first('username', "<h2 style='color:red;'>:message</h2>")}}
    {{ $errors->first('password', "<h2 style='color:brown;'>:message</h2>")}}

    <h1><span class="sign-up">sign up</span></h1>
    <p class="float">
      <label for="login"><i class="icon-user"></i>Username</label>
      {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username'));}}
    </p>
    <p class="float">
      <label for="password"><i class="icon-lock"></i>Password</label>
      {{ Form::password('password', array('placeholder' => 'Password'));}}
    </p>
    <p class="clearfix"> 
      {{ Form::submit('Sign up!');}}
    </p>
  {{ Form::close() }}
</section>

  </body>
</html>
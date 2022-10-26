<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Signin</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
    <form class="form-signin" action="loginController" method="post">

      <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/167/167707.png" alt="" width="72" height="72">

      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      
      {{@csrf_field()}}

      <label for="inputLogin" class="sr-only">Email address</label>
      <input type="text" id="inputLogin" class="form-control" placeholder="Login" name="login" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
      
      <input type="submit" id="submit" name="submit" class="btn btn-lg btn-secondary btn-block" value="Sign in">

      @error('login')
        <br><span><b>{{ $message }}</b></span>
      @enderror

      @error('password')
        <br><span><b>{{ $message }}</b></span>
      @enderror
      
    </form>
  </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/167/167707.png">

        <title>Signin</title>

        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
    </head>
    <body class="text-center bg-dark">
      <form class="form-signin" method="POST" action="{{ route('login') }}">
        <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/167/167707.png" alt="" width="72" height="72">

        <h1 class="h3 mb-3 font-weight-normal text-white">Please sign in</h1>
        @csrf

        <div class="row mb-3">
          <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('Email Address') }}</label>

          <div class="col-md-8">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-transparent text-white" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <label for="password" class="col-md-4 col-form-label text-md-end text-white">{{ __('Password') }}</label>

          <div class="col-md-8">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-transparent text-white" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="row mb-0">
          <div class="col-md-8 offset-md-2">
            <button type="submit" class="btn btn-primary">
              {{ __('Login') }}
            </button>
          </div>
        </div>
      </form>
    </body>
</html>

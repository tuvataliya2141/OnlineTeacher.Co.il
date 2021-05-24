<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Online Teacher</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <!-- <form class="form-horizontal" method="POST" action="{{ route('login') }}"> -->
      <form class="form-horizontal" method="POST" action="{{url('/login')}}">
        {{ csrf_field() }}
        <div class="input-group mb-3">
            <input id="email" type="text" class="form-control {{ ($errors->any() && $errors->first('email')) ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="Email"  >
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-envelope"></span>
                </div>
            </div>
            @if($errors->has('email'))
                    <p class="invalid-feedback">{{$errors->first('email')}}</p>
            @endif
        </div>
        <div class="input-group mb-3">
            <input id="password" type="password" class="form-control {{ ($errors->any() && $errors->first('password')) ? 'is-invalid' : '' }}" name="password" placeholder="Password" >
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            @if($errors->has('password'))
                    <p class="invalid-feedback">{{$errors->first('password')}}</p>
            @endif
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- <p class="mb-1">
        <a  href="{{ route('password.request') }}">forgot password</a>
      </p>
      <p class="mb-0">
        <a href="{{ 'register' }}" class="text-center">Register</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<!-- jQuery -->
<script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.min.js') }}"></script>
</body>
</html>

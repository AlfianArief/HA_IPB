
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Reset Password</b>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <form action="{{ route('user.resetpassword') }}" method="post" autocomplete="off">
        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif

        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group mb-3">
            <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Masukan Email" value="{{ $email ?? old('email') }}">
          <div class="input-group-append">
            
          </div>
        </div>
        <span class="text-danger">@error('email'){{ $message }}@enderror</span>

        <div class="form-group mb-3">
            <label for="password">New Password</label>
          <input type="password" class="form-control"name="password" placeholder="Masukan kata sandi" value="{{ old('password') }}">
          <div class="input-group-append">
          </div>
        </div>
        <span class="text-danger">@error('password'){{ $message }}@enderror</span>

        <div class="form-group mb-3">
            <label for="password">Konfirmasi Password</label>
          <input type="password" class="form-control" name="cpassword" placeholder="Masukanan ulang kata sandi" value="{{ old('cpassword') }}">
          <div class="input-group-append">
          </div>
        </div>
        <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
        
          <!-- /.col -->
          <div class="container px-0">
            <button type="submit" class="btn btn-primary btn-block">Reset password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-3 mx-2 px-3">
        <a href="{{ route('user.login') }}">Login</a>
      </p>
 

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>

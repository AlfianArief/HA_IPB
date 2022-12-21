
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
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
    <b>HIMPUNAN ALUMNI IPB</b> 
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan login terlebih dahulu</p>

      <form action="{{ route('user.check') }}" method="post" autocomplete="off">
        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        @csrf

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Masukan Email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('email'){{ $message }}@enderror</span>

        <div class="input-group mb-3">
          <input type="password" class="form-control"name="password" placeholder="Masukan kata sandi" value="{{ old('password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        
          <!-- /.col -->
          <div class="container px-0">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="container text-center mb-3 px-3">
        <p>- Atau -</p>
        <a href="{{ route('admin.login') }}" class="btn btn-block btn-danger">
          <i class="mr-2"></i>Login sebagai admin
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1 px-3">
        <a href="{{ route('user.formforgot') }}">Lupa Password</a>
      </p>
      <p class="mb-2 px-3">
        <a href="{{ route('user.register') }}" class="text-center">Belum punya akun? <u>daftar sekarang!</u></a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>
</html>

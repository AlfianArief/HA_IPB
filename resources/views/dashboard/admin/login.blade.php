<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
</head>
<body style="background-color: #d7dde3!important;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <div class="card px-4 py-4 border border-dark">
                    <h4>Admin Login</h4><hr>
                    <form action="{{ route('admin.check') }}" method="post">
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                        @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Email Address" value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
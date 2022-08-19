<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- CSS only -->
    <link href="{{ asset('bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <div class="card px-4 py-4 border border-dark">
                    <h4> User Login</h4>
                    <form action="{{ route('user.check') }}" method="post" autocomplete="off">
                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control border-primary" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control border-primary" name="password" placeholder="Enter Password" value="{{ old('password') }}">
                            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <br>
                        <a href="{{ route('user.register') }}">Create New Account</a>
                    </form>
                </div>
                <div class="card-body border border-dark text-center">
                    <a href="{{ route('admin.login') }}" class="text-dark">Login sebagai admin</a>
                </div> 
            </div>   
        </div>
    </body>
</html>

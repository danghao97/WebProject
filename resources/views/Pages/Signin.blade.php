<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--[if lt IE 9]>
            <script src="../../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <style media="screen">
            label {
                font-weight: bold;
            }
        </style>
        <title>ENGLISH CHALLENGE - Sign in</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 m-auto">
                    <div class="card border-success">
                        <img class="card-img-top" src="{{asset('images/logo.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="h3 card-title text-center text-success">
                                Sign in
                            </div>
                            @if ($errors->has('title'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{$errors->first('title')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form method='POST'>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control" placeholder="Username" name="username" value='{{old('username')}}'>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                    <a href="forgot" class="card-link ml-auto">Forgot password?</a>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center">
                            <a href="signup" class="card-link">Create a new account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

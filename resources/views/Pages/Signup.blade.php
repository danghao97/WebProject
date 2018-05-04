<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <title>ENGLISH CHALLENGE - Sign up</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 m-auto">
                    <div class="card border-success">
                        <div class="h5 card-header text-center text-success">
                            Sign up
                        </div>
                        <div class="card-body">
                            <form method='POST'>
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="fullname">Tên</label>
                                    <input id="fullname" type="text" class="form-control form-control-sm" placeholder="Tên" name="fullname">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="text" class="form-control form-control-sm" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="username">Tên đăng nhập</label>
                                    <input id="username" type="text" class="form-control form-control-sm" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input id="password" type="password" class="form-control form-control-sm" placeholder="Mật khẩu" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

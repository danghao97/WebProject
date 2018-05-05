@extends('Layouts.MainLayout')

@section('MainTitle')
    ENGLISH CHALLENGE - Configuration
@endsection

@section('MainBody')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">Sign up</h3>
                    </div>
                    <div class="panel-body">
                        <form method='POST'>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="fullname">Tên</label>
                                <input id="fullname" type="text" class="form-control  input-sm" placeholder="Tên" name="fullname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control  input-sm" placeholder="Email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <input id="username" type="text" class="form-control  input-sm" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input id="password" type="password" class="form-control  input-sm" placeholder="Mật khẩu" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

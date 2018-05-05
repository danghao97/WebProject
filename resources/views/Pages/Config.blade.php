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
                        <h3 class="panel-title">CẤU HÌNH SERVER</h3>
                    </div>
                    <div class="panel-body">
                        @if ($errors->has('title'))
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{$errors->first('title')}}
                            </div>
                        @endif
                        <form method='POST' enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="fullname">Tên</label>
                                <input id="fullname" type="text" class="form-control  input-sm" placeholder="Tên" name="fullname" value='{{old('fullname')}}'>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control  input-sm" placeholder="Email" name="email" value='{{old('email')}}'>
                            </div>
                            <div class="form-group">
                                <label for="username">Tên đăng nhập</label>
                                <input id="username" type="text" class="form-control  input-sm" placeholder="Username" name="username" value='{{old('username')}}'>
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input id="password" type="password" class="form-control  input-sm" placeholder="Mật khẩu" name="password">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Ảnh đại diện</label>
                                <input type="file" class="form-control-file" id="avatar" name="avatar">
                            </div>
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

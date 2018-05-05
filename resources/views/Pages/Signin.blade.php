@extends('Layouts.MainLayout')

@section('MainTitle')
    ENGLISH CHALLENGE - Sign in
@endsection

@section('MainBody')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img class="img-responsive" src="{{asset('images/logo.png')}}">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">Sign in</h3>
                    </div>
                    <div class="panel-body">
                        @if ($errors->has('title'))
                            <div class="alert alert-warning alert-dismissible" role="alert">
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
@endsection

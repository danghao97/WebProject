@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    HomePage
@endsection

@section('NavBar')VanHanh @endsection

@section('Content')
    <div class="panel panel-info">
        <div class="panel-body">
            <img class="img-responsive" src="data:image;base64,{{$user->avatar}}" alt="">
        </div>
    </div>
@endsection

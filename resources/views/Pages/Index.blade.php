@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    HomePage
@endsection

@section('NavBar')HomeNav @endsection

@section('Content')
    <div class="panel panel-info">
        <div class="panel-body">
            Xin chào {{$user->fullname}}<br>
            Trình độ: {{$myobject->objectname}} ({{$user->score}}/{{$myobject->totalscore}})<br>
            Bí quyết thi TOEIC
        </div>
    </div>
@endsection

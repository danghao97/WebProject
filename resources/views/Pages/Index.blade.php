@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    HomePage
@endsection

@section('NavBar')HomeNav @endsection

@section('Content')
    <div class="panel">
        <div class="panel-body">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">User Infomation</h3>
                </div>
                <div class="panel-body">
                    Xin chào {{$user->fullname}}<br>
                    Trình độ: {{$myobject->objectname}} ({{$user->score}}/{{$myobject->totalscore}})<br>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Bí quyết thi TOEIC</h3>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.Layout.Layout')
@section('title')
    HomePage
@endsection
@section('navitem')home @endsection
@section('content')
    <script type="text/javascript">
        function playPause() {
            var myVideo = $('#current');
            if (myVideo[0].paused) {
                myVideo[0].play();
            } else{
                myVideo[0].pause();
            }
        }

        function fullScreen() {
            var myVideo = $('#current');
            console.log(myVideo[0]);
            myVideo[0].webkitRequestFullScreen();
        }
    </script>
    <div class="card">
        <div class="card-body">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
@endsection

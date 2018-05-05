@extends('Layouts.MainLayout')

@section('MainTitle')
    ENGLISH CHALLENGE - @yield('CustomTitle')
@endsection

@section('MainCSS')
    <style media="screen">
        body {
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
    @yield('CustomCSS')
@endsection

@section('MainBody')
    <header>
        @include('Layouts.CustomLayout.Header')
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('Layouts.CustomLayout.LeftSideBar')
            </div>
            <div class="col-md-7">
                @yield('Content')
            </div>
            <div class="col-md-2">
                @include('Layouts.CustomLayout.RightSideBar')
            </div>
        </div>
    </div>
    <footer>
        @include('Layouts.CustomLayout.Footer')
    </footer>
@endsection

@section('MainJS')
    <script type="text/javascript">
        $(document).ready(() => {
            var id = '@yield('NavBar')';
            var navitem = $('#' + id.trim());
            navitem.addClass('active');
        });
    </script>
    @yield('CustomJS')
@endsection

@extends('Layouts.MainLayout')

@section('MainTitle')
    ENGLISH CHALLENGE - Administrator
@endsection

@section('MainCSS')
    <style media="screen">
        body {
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
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
            <div class="col-md-9">
                <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#Tab_DoiTuong" role="tab" data-toggle="tab" aria-controls="Tab_DoiTuong" aria-expanded="true">Đối tượng</a>
                        </li>
                        <li role="presentation">
                            <a href="#Tab_Video" role="tab" data-toggle="tab" aria-controls="Tab_Video" aria-expanded="true">Video</a>
                        </li>
                        <li role="presentation">
                            <a href="#Tab_CapDo" role="tab" data-toggle="tab" aria-controls="Tab_CapDo" aria-expanded="true">Cấp độ</a>
                        </li>
                        <li role="presentation">
                            <a href="#Tab_LoaiDoiTuong" role="tab" data-toggle="tab" aria-controls="Tab_LoaiDoiTuong" aria-expanded="true">Loại đối tượng</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" role="tabpanel" id="Tab_Video">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="col-md-9">
                                        {{-- @include('Layouts.VanHanh.Video.DanhSach') --}}
                                    </div>
                                    <div class="col-md-3">
                                        {{-- @include('Layouts.VanHanh.Video.Them') --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="Tab_DoiTuong">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="col-md-9">
                                        {{-- @include('Layouts.VanHanh.DoiTuong.DanhSach') --}}
                                    </div>
                                    <div class="col-md-3">
                                        {{-- @include('Layouts.VanHanh.DoiTuong.Them') --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="Tab_CapDo">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="col-md-6 col-md-offset-3">
                                        {{-- @include('Layouts.VanHanh.CapDo.CapDo') --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="Tab_LoaiDoiTuong">
                            <div class="panel">
                                <div class="panel-body">
                                    <div class="col-md-6 col-md-offset-3">
                                        {{-- @include('Layouts.VanHanh.LoaiDoiTuong.LoaiDoiTuong') --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            var navitem = $('#AdminNav');
            navitem.addClass('active');
        });
    </script>
    @yield('CustomJS')
@endsection

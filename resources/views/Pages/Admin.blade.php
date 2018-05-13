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
                    <ul class="nav nav-tabs nav-justified" role="tablist" id="All_Tabs">
                        <li role="presentation" class="active">
                            <a href="#Tab_Question" role="tab" data-toggle="tab" aria-controls="Tab_Question" aria-expanded="true">
                                Question
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#Tab_Type" role="tab" data-toggle="tab" aria-controls="Tab_Type" aria-expanded="true">
                                Type
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#Tab_Level" role="tab" data-toggle="tab" aria-controls="Tab_Level" aria-expanded="true">
                                Level
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="#Tab_Object" role="tab" data-toggle="tab" aria-controls="Tab_Object" aria-expanded="true">
                                Object
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" role="tabpanel" id="Tab_Question">
                            <div class="panel">
                                <div class="panel-body">
                                    @include('Layouts.Admin.Question.Question')
                                    @include('Layouts.Admin.Question.Add')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="Tab_Type">
                            <div class="panel">
                                <div class="panel-body">
                                    @include('Layouts.Admin.Type.Type')
                                    @include('Layouts.Admin.Type.Add')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="Tab_Level">
                            <div class="panel">
                                <div class="panel-body">
                                    @include('Layouts.Admin.Level.Level')
                                    @include('Layouts.Admin.Level.Add')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="Tab_Object">
                            <div class="panel">
                                <div class="panel-body">
                                    @include('Layouts.Admin.Object.Object')
                                    @include('Layouts.Admin.Object.Add')
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

            $('#All_Tabs a[href="#{{$tab_show}}"]').tab('show')
        });
    </script>
    @yield('AdminJS')
@endsection

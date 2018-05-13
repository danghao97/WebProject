@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    Chart
@endsection

@section('NavBar')ChartNav @endsection

@section('Content')
    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active">
                <a href="#Tab_Friend" role="tab" data-toggle="tab" aria-controls="Tab_Friend" aria-expanded="true">Friend Chart</a>
            </li>
            <li role="presentation">
                <a href="#Tab_World" role="tab" data-toggle="tab" aria-controls="Tab_World" aria-expanded="true">World Chart</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active in" role="tabpanel" id="Tab_Friend">
                <div class="panel">
                    <div class="panel-body">
                        @include('Layouts.Chart.Friend')
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="Tab_World">
                <div class="panel">
                    <div class="panel-body">
                        @include('Layouts.Chart.World')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

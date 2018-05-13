@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    Start
@endsection

@section('NavBar')StartNav @endsection

@section('Content')
    <div id="modalstart" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="StartModalLabel" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="StartModalLabel">Start Challenge</h4>
                </div>
                <div class="modal-body">
                    <h4>Question Infomation</h4>
                    <p>Type: {{$question->Type->typename}}</p>
                    <p>Level: {{$question->Level->levelname}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="startchallenge">Start</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modalalert" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="AlertModalLabel" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="AlertModalLabel">Title</h4>
                </div>
                <div class="modal-body">
                    <div id="AlertModalBody">
                        Body
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="/" class="btn btn-default" role="button">Home Page</a>
                    <a href="/Start" class="btn btn-primary" role="button">Next Challenge</a>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-body">
            <div class="panel panel-info">
                <div class="panel-body">
                    <p id="countdown" class="text-right">00:{{$countdown}}</p>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$question->Type->typename}} / {{$question->Level->levelname}}</h3>
                        </div>
                        <div class="panel-body">
                            {{$question->content}}
                        </div>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="answer" value="1">
                            {{$question->answer1}}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="answer" value="2">
                            {{$question->answer2}}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="answer" value="3">
                            {{$question->answer3}}
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="answer" value="4">
                            {{$question->answer4}}
                        </label>
                    </div>
                    <button id="submit" class="btn btn-primary" type="button" name="button">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('CustomJS')
    <script type="text/javascript">
        $(document).ready(() => {
            $('#modalstart').modal();
            $('#startchallenge').click((e) => {
                $('#modalstart').modal('hide');
            });
            var countdown;
            $('#modalstart').on('hidden.bs.modal', function (e) {
                var distance = {{$countdown}};
                countdown = setInterval(function() {
                    distance--;
                    document.getElementById("countdown").innerHTML = "00:" + ("0" + distance).slice(-2);

                    // If the count down is over, write some text
                    if (distance <= 0) {
                        clearInterval(countdown);
                        console.log('Expired');
                        document.getElementById("countdown").innerHTML = "EXPIRED";
                        $('#AlertModalLabel')[0].innerHTML = 'Timeout';
                        $('#AlertModalBody')[0].innerHTML = 'Timeout...';
                        $('#modalalert').modal({backdrop: 'static', keyboard: false});
                    }
                }, 1000);
            })
            $('#submit').click((e) => {
                var selected = $('input[name=answer]:checked').val();
                if (selected === undefined) {
                    $('#AlertModalLabel')[0].innerHTML = 'ERROR';
                    $('#AlertModalBody')[0].innerHTML = 'Chua chon dap an';
                    $('#modalalert').modal({backdrop: 'static', keyboard: false});
                    return;
                }
                e.preventDefault();
                var token = '{{csrf_token()}}';
                $.ajaxSetup({
                    header: {

                    }
                });
                $.ajax({
                    url: "{{url('/Answer')}}",
                    method: 'post',
                    data: {
                        answer: selected,
                        _token: token
                    },
                    success: (data) => {
                        clearInterval(countdown);
                        var result = JSON.parse(data);
                        switch (result['code']) {
                            case 0:// Logged out
                                $('#AlertModalLabel')[0].innerHTML = 'Logged out';
                                $('#AlertModalBody')[0].innerHTML = 'Logged out...';
                                window.location="http://{{$_SERVER['SERVER_NAME']}}";
                                break;
                            case 1:// Timeout
                                $('#AlertModalLabel')[0].innerHTML = 'Timeout';
                                $('#AlertModalBody')[0].innerHTML = 'Timeout...';
                                break;
                            case 2:// Failed
                                $('#AlertModalLabel')[0].innerHTML = 'Failed';
                                $('#AlertModalBody')[0].innerHTML = 'Failed...';
                                break;
                            case 3:// True
                                $('#AlertModalLabel')[0].innerHTML = 'True';
                                $('#AlertModalBody')[0].innerHTML = result['explanation'] + '<br>Bạn nhận được ' + result['score'] + ' điểm';
                                break;
                        }
                        $('#modalalert').modal({backdrop: 'static', keyboard: false});
                    }
                })
            });
        });
    </script>
@endsection

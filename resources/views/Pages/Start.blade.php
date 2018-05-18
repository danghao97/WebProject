@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    Start
@endsection

@section('NavBar')StartNav @endsection

@section('Content')
    @if ($question == null)
        <div class="panel panel-info">
            <div class="panel-body">
                Không có câu hỏi phù hợp với trình độ của bạn
            </div>
        </div>
    @else
        @include('Layouts.StartChallenge.Start')
    @endif
@endsection

@section('CustomJS')
    @if ($question != null)
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
                        $('#modalalert').modal();
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
                                    $('#AlertModalBody')[0].innerHTML = 'Explanation: ' + result['explanation'] + '<br>Bạn nhận được ' + result['score'] + ' điểm';
                                    break;
                            }
                            $('#modalalert').modal({backdrop: 'static', keyboard: false});
                        }
                    })
                });
            });
        </script>
    @endif
@endsection

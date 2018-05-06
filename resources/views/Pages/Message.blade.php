@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    Message
@endsection

@section('CustomCSS')
    <style media="screen">
        content-message {
            max-height: 1000px;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>
@endsection

@section('NavBar')MessageNav @endsection

@section('Content')
    <div class="panel">
        <div class="panel-body">
            @if (count($friends) == 0)
                Bạn chưa có bạn bè, hãy kết bạn để trò chuyện
            @else
                <div class="content-message">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$friend->fullname}}</h3>
                        </div>
                        <div class="panel-body">
                            @foreach ($chats as $chat)
                                @if ($chat->IsFromMe())
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-left">{{$chat->content}}</h3>
                                        </div>
                                    </div>
                                @else
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h3 class="panel-title text-right">{{$chat->content}}</h3>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <form action='/SendMessage/{{$friendid}}' method="post">
                    {{csrf_field()}}
                    <input type="text" class="form-control input-sm" id="contentchat" placeholder="Enter to send" name="contentchat">
                </form>
            @endif
        </div>
    </div>
@endsection

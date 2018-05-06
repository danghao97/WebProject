<div class="right-sidebar">
    <div class="list-group">
        @foreach ($friends as $friend)
            <a href="/Message/{{$friend->User->id}}" class="list-group-item">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-responsive" src="data:image;base64,{{$friend->User->avatar}}" alt="">
                    </div>
                    <div class="col-md-9">
                        {{$friend->User->fullname}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Fullname</th>
            <th>Score</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($worldchart as $key => $value)
            <tr>
                <td>{{$key}}</td>
                <td>{{$value->fullname}}</td>
                <td>{{$value->score}}</td>
                <td>
                    @if ($user->IsFriend($value->id))
                        <a href="/Message/{{$value->id}}" role="button" class="btn btn-primary btn-xs">
                            Message
                        </a>
                    @elseif ($user->id != $value->id)
                        <a href="/AddFriend/{{$value->id}}" role="button" class="btn btn-primary btn-xs">
                            Add Friend
                        </a>
                    @elseif ($user->id == $value->id)
                        <a href="#" role="button" class="btn btn-primary btn-xs disabled">
                            You
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

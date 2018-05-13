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
        @foreach ($friendchart as $key => $value)
            @if ($user->IsFriend($value->id))
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$value->fullname}}</td>
                    <td>{{$value->score}}</td>
                    <td>
                        <a href="/Message/{{$value->id}}" role="button" class="btn btn-primary btn-xs">
                            Message
                        </a>
                    </td>
                </tr>
            @elseif ($user->id == $value->id)
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$value->fullname}}</td>
                    <td>{{$value->score}}</td>
                    <td>
                        <a href="#" role="button" class="btn btn-primary btn-xs disabled">
                            You
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

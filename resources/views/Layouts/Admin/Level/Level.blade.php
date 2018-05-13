<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">List Level</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Score</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (count($levels) == 0)
                        <tr>
                            <td colspan="3" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @endif
                    @foreach ($levels as $level)
                        <tr>
                            <th>{{$level->idlevel}}</th>
                            <td>{{$level->levelname}}</td>
                            <td>{{$level->diem}}</td>
                            <td>
                                <a href="/Admin/DelLevel/{{$level->idlevel}}" role="button" class="btn btn-primary btn-xs">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

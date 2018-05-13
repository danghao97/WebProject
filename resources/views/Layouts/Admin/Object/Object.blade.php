<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">List Object</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Total Score</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (count($objects) == 0)
                        <tr>
                            <td colspan="4" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @endif
                    @foreach ($objects as $anobject)
                        <tr>
                            <th>{{$anobject->idobject}}</th>
                            <td>{{$anobject->objectname}}</td>
                            <td>{{$anobject->description}}</td>
                            <td>{{$anobject->totalscore}}</td>
                            <td>
                                <a href="/Admin/DelObject/{{$anobject->idobject}}" role="button" class="btn btn-primary btn-xs">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

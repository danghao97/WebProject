<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">List Type</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Explanation</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (count($types) == 0)
                        <tr>
                            <td colspan="3" class="text-center">Không có dữ liệu</td>
                        </tr>
                    @endif
                    @foreach ($types as $type)
                        <tr>
                            <th>{{$type->idtype}}</th>
                            <td>{{$type->typename}}</td>
                            <td>{{$type->explanation}}</td>
                            <td>
                                <a href="/Admin/DelType/{{$type->idtype}}" role="button" class="btn btn-primary btn-xs">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</div>

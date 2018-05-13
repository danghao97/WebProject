<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Add Object</h3>
    </div>
    <div class="panel-body">
        <form action="/Admin/AddObject" method="post">
            {{ csrf_field() }}
            <div class="col-md-4 form-group">
                <label for="objectname">Object Name:</label>
                <input type="text" class="form-control" id="objectname" placeholder="Object Name" name="objectname">
            </div>
            <div class="col-md-4 form-group">
                <label for="description">Object Description:</label>
                <input type="text" class="form-control" id="description" placeholder="Object Description" name="description">
            </div>
            <div class="col-md-4 form-group">
                <label for="totalscore">Total Score:</label>
                <input type="number" class="form-control" id="totalscore" placeholder="Total Score" name="totalscore">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
        </form>
    </div>
</div>

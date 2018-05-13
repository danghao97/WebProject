<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Add Level</h3>
    </div>
    <div class="panel-body">
        <form action="/Admin/AddLevel" method="post">
            {{ csrf_field() }}
            <div class="col-md-6 form-group">
                <label for="levelname">Level Name:</label>
                <input type="text" class="form-control" id="levelname" placeholder="Level Name" name="levelname">
            </div>
            <div class="col-md-6 form-group">
                <label for="levelscore">Level Score:</label>
                <input type="number" class="form-control" id="levelscore" placeholder="Level Score" name="levelscore">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
        </form>
    </div>
</div>

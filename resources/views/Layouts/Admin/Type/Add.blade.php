<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Add Type</h3>
    </div>
    <div class="panel-body">
        <form action="/Admin/AddType" method="post">
            {{ csrf_field() }}
            <div class="col-md-6 form-group">
                <label for="typename">Type Name:</label>
                <input type="text" class="form-control" id="typename" placeholder="Type Name" name="typename">
            </div>
            <div class="col-md-6 form-group">
                <label for="typeexplanation">Explanation:</label>
                <input type="text" class="form-control" id="typeexplanation" placeholder="Explanation" name="typeexplanation">
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
        </form>
    </div>
</div>

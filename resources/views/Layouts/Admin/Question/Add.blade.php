<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Add Question</h3>
    </div>
    <div class="panel-body">
        <form action="/Admin/AddQuestion" method="post">
            {{ csrf_field() }}
            <div class="col-md-4 form-group">
                <label for="type">Type:</label>
                <select id="type" class="form-control input-sm" name="type">
                    @foreach ($types as $type)
                        <option value="{{$type->idtype}}">{{$type->typename}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="level">Level:</label>
                <select id="level" class="form-control input-sm" name="level">
                    @foreach ($levels as $level)
                        <option value="{{$level->idlevel}}">{{$level->levelname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="object">Object:</label>
                <select id="object" class="form-control input-sm" name="object">
                    @foreach ($objects as $anobject)
                        <option value="{{$anobject->idobject}}">{{$anobject->objectname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 form-group">
                <label for="content">Content:</label>
                <textarea id="content" class="form-control input-sm" placeholder="Content" name="content" rows=3></textarea>
            </div>
            <div class="col-md-6 form-group">
                <label for="answer1">A:</label>
                <textarea id="answer1" class="form-control input-sm" name="answer1" rows=3></textarea>
            </div>
            <div class="col-md-6 form-group">
                <label for="answer2">B:</label>
                <textarea id="answer2" class="form-control input-sm" name="answer2" rows=3></textarea>
            </div>
            <div class="col-md-6 form-group">
                <label for="answer3">C:</label>
                <textarea id="answer3" class="form-control input-sm" name="answer3" rows=3></textarea>
            </div>
            <div class="col-md-6 form-group">
                <label for="answer4">D:</label>
                <textarea id="answer4" class="form-control input-sm" name="answer4" rows=3></textarea>
            </div>
            <div class="col-md-3 form-group">
                <label for="answer">Answer:</label>
                <select id="answer" class="form-control input-sm" name="answer">
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                    <option value="4">D</option>
                </select>
            </div>
            <div class="col-md-9">
                <label for="explanation">Explanation:</label>
                <textarea id="explanation" class="form-control input-sm" placeholder="Explanation" name="explanation" rows=5></textarea>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
        </form>
    </div>
</div>

<div id="modalstart" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="StartModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="StartModalLabel">Start Challenge</h4>
            </div>
            <div class="modal-body">
                <h4>Question Infomation</h4>
                <p>Type: {{$question->Type->typename}}</p>
                <p>Level: {{$question->Level->levelname}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="startchallenge">Start</button>
            </div>
        </div>
    </div>
</div>

<div id="modalalert" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="AlertModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="AlertModalLabel">Title</h4>
            </div>
            <div class="modal-body">
                <div id="AlertModalBody">
                    Body
                </div>
            </div>
            <div class="modal-footer">
                <a href="/" class="btn btn-default" role="button">Home Page</a>
                <a href="/Start" class="btn btn-primary" role="button">Next Challenge</a>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-body">
                <p id="countdown" class="text-right">00:{{$countdown}}</p>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$question->Type->typename}} / {{$question->Level->levelname}}</h3>
                    </div>
                    <div class="panel-body">
                        {{$question->content}}
                    </div>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="answer" value="1">
                        {{$question->answer1}}
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="answer" value="2">
                        {{$question->answer2}}
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="answer" value="3">
                        {{$question->answer3}}
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="answer" value="4">
                        {{$question->answer4}}
                    </label>
                </div>
                <button id="submit" class="btn btn-primary" type="button" name="button">OK</button>
            </div>
        </div>
    </div>
</div>

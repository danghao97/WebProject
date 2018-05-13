<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">List Question</h3>
    </div>
    <div class="panel-body">
        @foreach ($questions as $question)
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="col-md-6">
                        <label>Type/Level:</label> {{$question->Type->typename}} / {{$question->Level->levelname}}
                    </div>
                    <div class="col-md-6">
                        <label>Object:</label> {{$question->MyObject->objectname}}
                    </div>
                    <div class="col-md-12">
                        <label>Content:</label> {{$question->content}}
                    </div>
                    <div class="col-md-6" id='qs{{$question->id}}1'>
                        <label>A:</label> {{$question->answer1}}
                    </div>
                    <div class="col-md-6" id='qs{{$question->id}}2'>
                        <label>B:</label> {{$question->answer2}}
                    </div>
                    <div class="col-md-6" id='qs{{$question->id}}3'>
                        <label>C:</label> {{$question->answer3}}
                    </div>
                    <div class="col-md-6" id='qs{{$question->id}}4'>
                        <label>D:</label> {{$question->answer4}}
                    </div>
                    <div class="col-md-12">
                        <label>Explanation:</label> {{$question->explanation}}
                    </div>
                </div>
            </div>
        @endforeach
        {!!$questions->links()!!}
    </div>
</div>

@section('AdminJS')
    <script type="text/javascript">
        @foreach ($questions as $question)
            var qs = $('#qs{{$question->id}}{{$question->answer}}').css('color', 'red');
        @endforeach
    </script>
@endsection

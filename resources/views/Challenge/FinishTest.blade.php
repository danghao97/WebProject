@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
FinishTest
@endsection

@section('Content')
<div class="panel">
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Finish Test</h3>
            </div>
            <div class="panel-body text-center">
                <h3>This is your score: </h3>
                <h2><?php echo $score;?></h2>
                <img src="http://laravel.test/picture/end.png" width="30%">
                <hr>
                <div class="alert alert-success">
                    <a href="http://laravel.test/home">
                        <strong>Waiting for your opponent to complete the challenge.</strong><br>
                        You will be redirect in 3 seconds.
                    </a>
                </div>
            </div>
            <meta http-equiv="refresh" content="3;url=http://cnweb.test/" />
        </a>
    </div>
</div>
</div>
</div>
</div>
@endsection
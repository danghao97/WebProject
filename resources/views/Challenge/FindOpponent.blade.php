@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
    FindOpponent
@endsection

@section('Content')
    <div class="panel">
        <div class="panel-body">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Finding Opponent</h3>
                </div>
                <div class="panel-body text-center">
                    <h3>
                    <?php
                        echo "You will challenge ".$name.'<br><br><br>';
                    ?>
                    </h3>
                    <form method="post" action="StartChallenge">
                        @csrf
                        <input type="hidden" name="player2" value="<?php echo $email; ?>">
                        <input type="hidden" name="created_at" value="<?php echo $created_at; ?>">
                        <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
                        <input type="submit" name="submit" value="Start Challenge" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

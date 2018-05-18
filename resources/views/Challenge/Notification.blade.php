@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
Notification
@endsection

@section('NavBar')HomeNav @endsection

@section('Content')
<div class="panel">
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Notification</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12" >
                        <div class="row" style="margin: 3px 0px 3px 0px;">
                            <div class="col-md-12 text-center" style="font-size: 20px">You got challenged from:</div>
                        </div>
                        <div style="width: 100%; height:400px; overflow-y: scroll;">
                            <br>
                            <?php
                            foreach ($result as $key => $value) {
                                ?>
                                <div class="row">
                                    <div class="col-md-8" style="left: 30px">
                                        <?php echo $value['fullname'];
                                        ?>
                                    </div>
                                    <div class="col-md-4">
                                        <form method="post" action="AcceptChallenge">
                                            @csrf
                                            <input type="hidden" name="player1" value="<?php echo $value['email']; ?>">
                                            <input type="hidden" name="created_at" value="<?php echo $value['created_at'] ?>">
                                            <input type="hidden" name="test_id" value="<?php echo $value['test_id'] ?>">
                                            <input type="submit" name="submit" value="Accept" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

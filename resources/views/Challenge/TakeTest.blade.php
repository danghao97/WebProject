@extends('Layouts.CustomLayout.Layout')

@section('CustomTitle')
TakeTest
@endsection
<div class="sidenav" style="position: fixed;
background-color: #4CAF50;
transition: 0.3s;
padding: 15px;
width: 120px;
text-decoration: none;
font-size: 15px;
color: white;
border-radius: 0 5px 5px 0;
z-index: 10">
You have<br>
<span id="clock">15m 0s</span> left
</div>
<script type="text/javascript">
    function countdown()
    {
        var currentTime = new Date();
        var endTime = new Date(currentTime);
        endTime.setMinutes(currentTime.getMinutes() + 15);

        var x = setInterval(function() {
            var distance = endTime.getTime() - currentTime.getTime();
            
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById("clock").innerHTML = minutes + "m " + seconds + "s ";

            if (distance < 2) {
                clearInterval(x);
                document.getElementById("submit").click();
            }
            currentTime = new Date();
        }, 1000);
    }
    window.onload = countdown();
</script>
@section('Content')
<div class="panel">
    <div class="panel-body">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Take Test</h3>
            </div>
            <div class="panel-body text-center">
                <form method="post" action="FinishTest">
                    @csrf
                    <div class="row">
                        <div class="col-md-9 text-center">
                            <h3>Question</h3>
                        </div>
                        <div class="col-md-3">
                            <h3>Answer</h3>
                        </div>
                    </div>
                    <hr>
                    <?php
                    foreach ($test as $key => $value) {
                        $array = json_decode(json_encode($value), true);
                        $number = $key + 1;
                        ?>
                        <div class="row">
                            <div class="col-md-9 text-left">
                                <?php
                                echo $number.". ";
                                echo $array['Question']; 
                                ?>
                            </div>
                            <div class="col-md-3 text-left">
                                <fieldset id="<?php echo $number ?>">
                                    <input type="radio" value="A" name="<?php echo $number ?>">
                                    <?php echo $array['Answer1']; ?><br>
                                    <input type="radio" value="B" name="<?php echo $number ?>">
                                    <?php echo $array['Answer2']; ?><br>
                                    <input type="radio" value="C" name="<?php echo $number ?>">
                                    <?php echo $array['Answer3']; ?><br>
                                    <input type="radio" value="D" name="<?php echo $number ?>">
                                    <?php echo $array['Answer4']; ?>
                                </fieldset>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                    ?>
                    <div class="text-right">
                        <input type="hidden" name="test_id" value="<?php echo $test_id; ?>">
                        <input type="hidden" name="created_at" value="<?php echo $created_at ?>">
                        <input type="hidden" name="player2" value="<?php echo $player2 ?>">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
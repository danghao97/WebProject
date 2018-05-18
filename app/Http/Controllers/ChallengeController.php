<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
	public function __construct()
    {
        $this->middleware('AppMiddleWare');
    }

    public function findOpponent()
    {
    	$user = Auth::user();
    	$friends = $user->Friends;
        $myobject = $user->MyObject();

    	$data['user'] = $user;
    	$data['friends'] = $friends;
    	$data['myobject'] = $myobject;

    	 $opponent = DB::table('users')
		->where('email','!=',Auth::user()->email)
		->where('type','=',0)
		->take(1)
		->orderByRaw('RAND()')
		->pluck('fullname','email');

		$array = json_decode(json_encode($opponent), true);

		foreach ($array as $key => $value) {
			$opponent_name=$value;
			$opponent_email=$key;
		}

		$test_id = DB::table('test')
		->take(1)
		->orderByRaw('RAND()')
		->pluck('test_id');

		$test_id=json_decode(json_encode($test_id), true);
		$data['test_id']=$test_id[0];

		$data['name'] = $opponent_name;
		$data['email'] = $opponent_email;

		$current_time = date('Y-m-d H:i:s');
		$data['created_at']=$current_time;

		DB::table('challenge')->insert(
			['created_at'=>$current_time,'player1'=>Auth::user()->email,'player2'=>$opponent_email,
			'test_id'=>$test_id[0],'player1_score'=>0,'player2_score'=>0]);

		return view('Challenge.FindOpponent',$data);
    }

    public function startChallenge(Request $request)
    {
    	$result = DB::table('test')
		->where('test_id','=',$request->input('test_id'))
		->get()
		->toArray();

		$data['test'] = $result;

		$data['test_id'] = $request->input('test_id');
		$data['created_at'] = $request->input('created_at');
		$data['player2'] = $request->input('player2');

		DB::table('challenge')
    	->where('created_at','=',$request->input('created_at'))
    	->where('player1','=',Auth::user()->email)
    	->where('player2','=',$request->input('player2'))
    	->where('test_id','=',$request->input('test_id'))
    	->update(['player1_done'=>true]);

		$user = Auth::user();
    	$friends = $user->Friends;
        $myobject = $user->MyObject();

    	$data['user'] = $user;
    	$data['friends'] = $friends;
    	$data['myobject'] = $myobject;
		return view('Challenge.TakeTest', $data);
    }

    public function compare2String($a1, $a2)
	{
		$score=0;
		for ($i=0; $i < strlen($a1); $i++) { 
			if($a1[$i]==$a2[$i]) $score++;
		}
		return $score;
	}

    public function finishTest(Request $request)
    {
    	$user = Auth::user();
    	$friends = $user->Friends;
        $myobject = $user->MyObject();

    	$data['user'] = $user;
    	$data['friends'] = $friends;
    	$data['myobject'] = $myobject;

    	$answer = "";
    	for ($i=1; $i <= 40; $i++) { 
    		if ($request->input($i)!='') {
    			$answer = $answer.$request->input($i);
    		}
    		else
    		{
    			$answer = $answer.'-';
    		}
    	}

    	//lấy ra đáp án của bài test, ghép lại thành xâu kí tự
    	$rs = DB::table('answer')
    	->where('id','=',$request->input('test_id'))
    	->get();
    	$rs = json_decode(json_encode($rs), true);
    	
    	
    	$result = "";
    	foreach ($rs as $key => $value) {
    		$array = json_decode(json_encode($value), true);
    		$result = $result.$array['Answer'];
    	}

    	$score = self::compare2String($answer,$result);
    	$data['score'] = $score;

    	//cập nhật số điểm của người chơi
    	DB::table('challenge')
    	->where('created_at','=',$request->input('created_at'))
    	->where('player1','=',Auth::user()->email)
    	->where('player2','=',$request->input('player2'))
    	->where('test_id','=',$request->input('test_id'))
    	->update(['player1_score'=>$score]);

    	DB::table('users')
    	->where('email','=',Auth::user()->email)
    	->update(['score'=>Auth::user()->score+$score*5]);

    	return view('Challenge.FinishTest',$data);
    }

    public function getNoti()
    {
    	$user = Auth::user();
    	$friends = $user->Friends;
        $myobject = $user->MyObject();

    	$data['user'] = $user;
    	$data['friends'] = $friends;
    	$data['myobject'] = $myobject;

    	$result = DB::select("select users.fullname, users.email,challenge.created_at,challenge.test_id from CNWeb.users,CNWeb.challenge where users.email = challenge.player1 and challenge.player2_done = 0 and challenge.player2 = '".Auth::user()->email."';");

    	$data['result'] = json_decode(json_encode($result), true);

    	return view('Challenge.Notification',$data);
    }

    public function acceptChallenge(Request $request)
    {
    	$user = Auth::user();
    	$friends = $user->Friends;
        $myobject = $user->MyObject();

    	$data['user'] = $user;
    	$data['friends'] = $friends;
    	$data['myobject'] = $myobject;

    	$result = DB::table('test')
		->where('test_id','=',$request->input('test_id'))
		->get()
		->toArray();

		$data['test'] = $result;
		$data['test_id'] = $request->input('test_id');
		$data['created_at'] = $request->input('created_at');
		$data['player1'] = $request->input('player1');

    	return view('Challenge.AcceptChallenge',$data);
    }

    public function finishAccept(Request $request)
    {
    	$user = Auth::user();
    	$friends = $user->Friends;
        $myobject = $user->MyObject();

    	$data['user'] = $user;
    	$data['friends'] = $friends;
    	$data['myobject'] = $myobject;

    	$answer = "";
    	for ($i=1; $i <= 40; $i++) { 
    		if ($request->input($i)!='') {
    			$answer = $answer.$request->input($i);
    		}
    		else
    		{
    			$answer = $answer.'-';
    		}
    	}

    	//lấy ra đáp án của bài test, ghép lại thành xâu kí tự
    	$rs = DB::table('answer')
    	->where('id','=',$request->input('test_id'))
    	->get();
    	$rs = json_decode(json_encode($rs), true);
    	
    	
    	$result = "";
    	foreach ($rs as $key => $value) {
    		$array = json_decode(json_encode($value), true);
    		$result = $result.$array['Answer'];
    	}

    	$score = self::compare2String($answer,$result);
    	$data['score'] = $score;

    	//cập nhật số điểm của người chơi
    	DB::table('challenge')
    	->where('created_at','=',$request->input('created_at'))
    	->where('player2','=',Auth::user()->email)
    	->where('player1','=',$request->input('player1'))
    	->where('test_id','=',$request->input('test_id'))
    	->update(['player2_score'=>$score,'player2_done'=>true]);

    	DB::table('users')
    	->where('email','=',Auth::user()->email)
    	->update(['score'=>Auth::user()->score+$score*5]);

    	return view('Challenge.FinishTest',$data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function Answer(Request $req)
    {
        // code: 0 => Logged out, 1 => Timeout, 2 => Failed, 3 => True
        if (!Auth::check()) {
            return json_encode(['code' => 0]);
        }
        $user = Auth::user();
        $LastQuestion = $user->LastQuestion();
        if ($LastQuestion == null) {
            return json_encode(['code' => 1]);
        }
        // answer != 0 => answered
        if ($LastQuestion->answered != 0 || $LastQuestion->Question->answer != $req->answer) {
            $LastQuestion->answered = -1;
            $LastQuestion->save();
            return json_encode(['code' => 2]);
        }
        $LastQuestion->answered = $req->answer;
        $LastQuestion->save();
        $user->score += $LastQuestion->Question->Level->diem;
        $user->save();
        $result = [
            'code' => 3,
            'explanation' => $LastQuestion->Question->explanation,
            'score' => $LastQuestion->Question->Level->diem
        ];
        return json_encode($result);
    }
}

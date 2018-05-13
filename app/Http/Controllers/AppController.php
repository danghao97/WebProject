<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('AppMiddleWare');
    }

    public function Index()
    {
        $user = Auth::user();
        $friends = $user->Friends;
        $myobject = $user->MyObject();
        return view('Pages.Index', [
            'user' => $user,
            'friends' => $friends,
            'myobject' => $myobject,
            ]);
    }

    public function Chart()
    {
        $user = Auth::user();
        $friends = $user->Friends;
        $users = \App\User::all();
        $friendChart = \App\Chart::FriendChart();
        $worldChart = \App\Chart::WorldChart();
        return view('Pages.Chart', [
            'user' => $user,
            'friends' => $friends,
            'users' => $users,
            'friendchart' => $friendChart,
            'worldchart' => $worldChart,
        ]);
    }

    public function Start()
    {
        $user = Auth::user();
        $friends = $user->Friends;
        $lastquestion = Auth::user()->LastQuestion();
        if ($lastquestion == null) {
            // Create new question
            $question = Auth::user()->RandomQuestion();
            $lastquestion = new \App\UserChallenge();
            $lastquestion->iduser = $user->id;
            $lastquestion->idquestion = $question->id;
            $lastquestion->answered = 1;
            $lastquestion->save();
        }
        $countdown = 30 - (time() - strtotime($lastquestion->created_at));
        $countdown = $countdown < 10 ? '0' . $countdown : $countdown;
        return view('Pages.Start', [
            'user' => $user,
            'friends' => $friends,
            'question' => $lastquestion->Question,
            'countdown' => $countdown,
        ]);
    }

    public function Answer()
    {
        return 'Hello' . rand();
    }

    public function Message($userid = null)
    {
        $user = Auth::user();
        $friends = $user->Friends;

        if ($userid == null) {
            if (count($friends) != 0) {
                return redirect()->route("Message", ['userid' => $friends[0]->iduser]);
            }
        } else {
            $chats = $user->Chats($userid);
            $friend = \App\User::find($userid);
            return view('Pages.Message', [
                'user' => $user,
                'friend' => $friend,
                'friends' => $friends,
                'chats' => $chats,
                'friendid' => $userid,
            ]);
        }
        return view('Pages.Message', ['user' => $user, 'friends' => $friends]);
    }

    public function SendMessage(Request $req, $userid)
    {
        $user = Auth::user();
        $chat = new \App\Chat();
        $chat->idfrom = $user->id;
        $chat->idto = $userid;
        $chat->content = $req->contentchat;
        $chat->save();
        return redirect()->back();
    }

    public function AddFriend($userid)
    {
        $user = Auth::user();
        if (!$user->IsFriend($userid) && $user->id != $userid) {
            $friend = new \App\Friend();
            $friend->idown = $user->id;
            $friend->iduser = $userid;
            $friend->save();
            $friend = new \App\Friend();
            $friend->idown = $userid;
            $friend->iduser = $user->id;
            $friend->save();
        }
        return redirect()->route('Chart');
    }

    public function About()
    {
        $user = Auth::user();
        $friends = $user->Friends;
        return view('Pages.About', ['user' => $user, 'friends' => $friends]);
    }

    public function Admin(Request $req)
    {
        $user = Auth::user();
        $tab_show = session('tab_show') ? session('tab_show') : 'Tab_Question';
        if ($user->type == 0) {
            return redirect()->route('/');
        }
        $friends = $user->Friends;
        $questions = \App\Question::paginate(5);
        return view('Pages.Admin', [
            'user' => $user,
            'friends' => $friends,
            'tab_show' => $tab_show,
            'questions' => $questions,
        ]);
    }

    public function Admin2()
    {
        return redirect()->route('Admin')->with('tab_show', 'Tab_LoaiDoiTuong');
    }

    public function Signout()
    {
        $signin = redirect()->route('Signin');
        if (!Auth::check()) {
            $errors = new MessageBag(['title' => 'Bạn chưa đăng nhập vào hệ thống']);
            return $signin->withErrors($errors);
        }
        Auth::logout();
        return $signin;
    }
}

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
            if ($question != null) {
                $lastquestion = new \App\UserChallenge();
                $lastquestion->iduser = $user->id;
                $lastquestion->idquestion = $question->id;
                $lastquestion->answered = 0;
                $lastquestion->save();
            } else {
                return view('Pages.Start', [
                    'user' => $user,
                    'friends' => $friends,
                    'question' => null,
                ]);
            }
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

    public function isAdmin()
    {
        return Auth::user()->type == 1;
    }

    public function Admin(Request $req)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('/');
        }
        $user = Auth::user();
        $tab_show = session('tab_show') ? session('tab_show') : 'Tab_Question';
        $friends = $user->Friends;
        $questions = \App\Question::paginate(5);
        $types = \App\Type::all();
        $levels = \App\Level::all();
        $objects = \App\MyObject::all();
        return view('Pages.Admin', [
            'user' => $user,
            'friends' => $friends,
            'tab_show' => $tab_show,
            'questions' => $questions,
            'types' => $types,
            'levels' => $levels,
            'objects' => $objects,
        ]);
    }

    public function AddQuestion(Request $req)
    {
        $question = new \App\Question();
        $question->idtype = $req->type;
        $question->idlevel = $req->level;
        $question->idobject = $req->object;
        $question->content = $req->content;
        $question->answer1 = $req->answer1;
        $question->answer2 = $req->answer2;
        $question->answer3 = $req->answer3;
        $question->answer4 = $req->answer4;
        $question->answer = $req->answer;
        $question->explanation = $req->explanation;
        $question->save();
        return redirect()->route('Admin')->with('tab_show', 'Tab_Question');
    }

    public function AddType(Request $req)
    {
        $type = new \App\Type();
        $type->typename = $req->typename;
        $type->explanation = $req->typeexplanation;
        $type->save();
        return redirect()->route('Admin')->with('tab_show', 'Tab_Type');
    }

    public function AddLevel(Request $req)
    {
        $level = new \App\Level();
        $level->levelname = $req->levelname;
        $level->diem = $req->levelscore;
        $level->save();
        return redirect()->route('Admin')->with('tab_show', 'Tab_Level');
    }

    public function AddObject(Request $req)
    {
        $anobject = new \App\MyObject();
        $anobject->objectname = $req->objectname;
        $anobject->description = $req->description;
        $anobject->totalscore = $req->totalscore;
        $anobject->save();
        return redirect()->route('Admin')->with('tab_show', 'Tab_Object');
    }

    public function DelType($id)
    {
        $type = \App\Type::find($id);
        if ($type != null) {
            $type->delete();
        }
        return redirect()->route('Admin')->with('tab_show', 'Tab_Type');
    }

    public function DelLevel($id)
    {
        $level = \App\Level::find($id);
        if ($level != null) {
            $level->delete();
        }
        return redirect()->route('Admin')->with('tab_show', 'Tab_Level');
    }

    public function DelObject($id)
    {
        $anobject = \App\MyObject::find($id);
        if ($anobject != null) {
            $anobject->delete();
        }
        return redirect()->route('Admin')->with('tab_show', 'Tab_Object');
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

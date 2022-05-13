<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lecture;
use App\Models\User;

class LectureController extends Controller
{

    public function index()
    {

        // 取得中のレクチャー
        $userid = Auth::id();
        $nowlectures = User::findOrFail($userid)->lectures;


        return view('lectures.index', compact('nowlectures'));
    }
    public function edit()
    {
        // 取得中のレクチャー
        $userid = Auth::id();
        $nowlectures = User::findOrFail($userid)->lectures;
        // 全てのレクチャー
        $alllectures = Lecture::all();
        // 取得中のレクチャーidを配列で取得(チェックボックスcheck判定用)
        $lecturearray = [];
        foreach ($nowlectures as $lecture) {
            array_push($lecturearray, $lecture->name);
        }
        return view('lectures.edit', compact('nowlectures', 'alllectures', 'lecturearray'));
    }

    public function store(Request $request)
    {
        // dd($request['lecture']);
        $userid = Auth::id();
        User::findOrFail($userid)->lectures()->sync($request['lecture']);
        return redirect()->route('lectures.index');
    }
}

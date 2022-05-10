<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text;

class TextController extends Controller
{
    public function index()
    {
        $allpost = text::all();
        return view('texts.index', compact('allpost'));
    }
    public function create()
    {
        return view('texts.create');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:2|max:50',
            'content' => 'required|max:255'
        ]);

        text::create([
            'title' => $request['title'],
            'content' => $request['content']
        ]);


        session()->flash(
            'flash_message',
            '登録完了'
        );

        return redirect()->route('text.index');
    }
}

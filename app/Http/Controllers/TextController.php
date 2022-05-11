<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text;
use Illuminate\Support\Facades\DB;

class TextController extends Controller
{
    public function index()
    {
        // エロくあんと
        $allpost = text::all();
        // クエリビルダー
        $querybuilder = DB::table('texts')->get();
        $querybuilderfirst = DB::table('texts')->first();
        // コレクション型
        $collection = collect(['aaa', 'bbb']);

        // $allpost = Text::where('title', 'like', 'タ%')->select('title')->get();

        return view('texts.index', compact('allpost'));
    }
    public function create()
    {
        return view('texts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:50',
            'content' => 'required|max:1000',
            'email' => 'required|unique:texts',
            'price' => 'required'
        ]);

        text::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'email' => $request['email'],
            'price' => $request['price'],
            'is_visible' => $request['is_visible']
        ]);


        session()->flash(
            'flash_message',
            '登録完了'
        );

        return redirect()->route('texts.index');
    }
    public function show($id)
    {
        // dd($id);
        $text = Text::findOrFail($id);
        return view('texts.show', compact('text'));
    }
    public function edit($id)
    {
        $text = Text::findOrFail($id);
        return view('texts.edit', compact('text'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|min:2|max:50',
            'content' => 'required|max:1000',
            'price' => 'required'
        ]);

        $text = Text::findOrFail($id);
        $text->title = $request['title'];
        $text->content = $request['content'];
        $text->price = $request['price'];
        $text->is_visible = $request['is_visible'];
        $text->save();


        session()->flash('flash_message', '更新完了');
        return redirect()->route('texts.index');
    }
    public function delete($id)
    {
        $text = Text::findOrFail($id)->delete();
        return redirect()->route('texts.index');
    }
}

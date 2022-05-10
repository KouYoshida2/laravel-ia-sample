<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sample;

class SampleController extends Controller
{
    public function index()
    {
        $samples = sample::all();
        // dd($sanples);
        return view('samples.index', compact('samples'));
    }

    public function create()
    {
        return view('samples/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:samples',
        ]);
        // dd($request);

        // bdに保存するコード
        sample::create([
            'name' => $request['name'],
            'email' => $request['email']
        ]);

        session()->flash('flash_message', '登録OKです。');

        // return view('samples.index');

        return redirect()->route('samples.index');
    }
}

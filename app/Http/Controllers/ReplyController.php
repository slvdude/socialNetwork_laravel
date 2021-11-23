<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{
    //
    public function store(Request $request)
    {
        if (auth()->check()) {
            Reply::create([
                'post_id' => $request->input('post_id'),
                'body' => $request->input('body'),
                'reply' => $request->input('reply'),
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('home')->with('success','Reply added');
        }

        return back()->withInput()->with('error','Something wrong');
        
    }
}

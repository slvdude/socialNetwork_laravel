<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required',
            //'profile_id' => 'required'
        ]);
        dump($request->id);
        $request->user()->posts()->create([
            'body' => $request->body,
            'profile_id' => $request->id
        ]);

        return back();
    }

    public function destroy(Post $post) {
        $post->delete();
        return back();
    }
}

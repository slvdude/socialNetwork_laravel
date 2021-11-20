<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function store(Request $request) {
        $this->validate($request, [
            'body' => 'required',
            //'profile_id' => 'required'
        ]);
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

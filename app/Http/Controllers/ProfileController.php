<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    //

    public function index(User $user) {
        
        $posts = Post::where('profile_id', $user->id)->take(5)->get();

        return view('profile.profile', [
            'user' => $user,
            'posts' =>$posts
        ]);
    }
}

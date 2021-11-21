<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('profile_id', auth()->user()->id)->take(5)->get();
        //dd($posts);
        return view('home', [
            'posts' => $posts
        ]);
    }

    public function load() {
        $count = Post::where('profile_id', auth()->user()->id)->count();
        //dd($count);
        $skip = 5;
        $limit = $count - $skip;
        $collection = Post::where('profile_id', auth()->user()->id)->skip($skip)->take($limit)->get();
        return response()->json(['success'=>true, 'data'=>$collection]);
    }
}

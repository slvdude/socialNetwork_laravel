@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="pl-4 mt-4">{{ $user->name }}</h1>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @auth
                    <form action="/post" class="form-horizontal" method="post">
                        @csrf
                        <input type="hidden" value="{{ $user->id }}" name="id">
                        <textarea class="form-control" rows="3" name="body"></textarea>
                        <button class="btn btn-primary mt-2">Create a post</button>
                    </form>
                    @endauth
                    @if($posts->count()) 
                        @foreach ($posts as $post)
                            <div class="bg-light">
                                <div class=" pl-4 mt-4">
                                    <a href="{{ route('profile.user', $post->user) }}" class="font-bold">{{ $post->user->name }}</a><span class="font-weight-bold text-secondary pl-4 small">{{ $post->created_at->diffForHumans() }}</span>
                                    <p class="mb-2">{{ $post->body }}</p>
                                </div>
                                @auth
                                @if($post->ownedBy(auth()->user()->id))
                                    <form action="{{ route('post.destroy', $post) }}" class="form-horizontal" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-link pl-4">Delete</button>
                                    </form>
                                @endif
                                @endauth
                            </div>
                        @endforeach
                        @if($posts->count() >= 5)
                            <a href="#" class="pl-2"><i class="fas fa-arrow-down fa-2x"></i></a>
                        @endif
                    @else
                        <p class="center">There are no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
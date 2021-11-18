@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post something') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="/post" class="form-horizontal" method="post">
                        @csrf
                        <textarea class="form-control" rows="3" name="body"></textarea>
                        <button class="btn btn-primary mt-2">Create a post</button>
                    </form>
                    @if($posts->count()) 
                        @foreach ($posts as $post)
                            <div class=" pl-4 mt-4">
                                <a href="" class="font-bold">{{ $post->user->name }}</a>
                                <p class="mb-2">{{ $post->body }}</p>
                            </div>
                                <form action="{{ route('post.destroy', $post) }}" class="form-horizontal" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link pl-4">Delete</button>
                                </form>
                        @endforeach
                    @else
                        <p class="center">There are no posts</p>
                    @endif
            </div>
        </div>
    </div>
</div>
@endsection

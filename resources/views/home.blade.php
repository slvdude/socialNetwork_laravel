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
                        <input type="hidden" value="{{ auth()->user()->id }}" name="id">
                        <textarea class="form-control" rows="3" name="body"></textarea>
                        <button class="btn btn-primary mt-2">Create a post</button>
                    </form>
                    @if($posts->count()) 
                        @foreach ($posts as $post)
                        <div class="bg-light">
                            <div class=" pl-4 mt-4">
                                <a href="{{ route('profile.user', $post->user) }}" class="font-bold">{{ $post->user->name }}</a><span class="font-weight-bold text-secondary pl-4 small">{{ $post->created_at->diffForHumans() }}</span>
                                <p class="mb-2">{{ $post->body }}</p>
                            </div>
                            <div class="d-flex flex-row bd-highlight mb-3">
                                <form action="{{ route('post.destroy', $post) }}" class="form-horizontal" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-link pl-4">Delete</button>
                                </form>
                                <form action="" class="form-horizontal" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-link pl-4">Reply</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        <div class="data"></div>
                        @if($posts->count() >= 5)
                            <button class="btn btn-link" id="load"><i class="fas fa-arrow-down fa-2x pl-1"></i></button>
                        @endif
                    @else
                        <p class="center">There are no posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function(){
                $('#load').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('load') }}",
                    method: 'get',
                    dataType: "json",
                    success: function(response){
                        console.log(response.data);
                        $.each(response.data, function(key, item) {
                            $(".data").append(
                                '<div class="bg-light">\
                                    <div class=" pl-4 mt-4">\
                                        <a href="{{ route('profile.user', $post->user) }}" class="font-bold">'+item.name+'</a><span class="font-weight-bold text-secondary pl-4 small">{{ $post->created_at->diffForHumans() }}</span>\
                                        <p class="mb-2">'+item.body+'</p>\
                                    </div>\
                                    <div class="d-flex flex-row bd-highlight mb-3">\
                                        <form action="{{ route('post.destroy', '+item+') }}" class="form-horizontal" method="post">\
                                            @csrf\
                                            @method('delete')\
                                            <button type="submit" class="btn btn-link pl-4">Delete</button>\
                                        </form>\
                                        <form action="" class="form-horizontal" method="post">\
                                            @csrf\
                                            <button type="submit" class="btn btn-link pl-4">Reply</button>\
                                        </form>\
                                    </div>\
                                </div>'
                            );
                        })
                    }});
                });
                });
</script>
@endsection
@endsection

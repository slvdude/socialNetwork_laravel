<div>
@foreach($collection as $item)
<div class="bg-light">
    <div class=" pl-4 mt-4">
        <a href="{{ route('profile.user', $item->user) }}" class="font-bold">{{ $item->user->name }}</a><span class="font-weight-bold text-secondary pl-4 small">{{ $item->created_at->diffForHumans() }}</span>
        <p class="mb-2">{{ $item->body }}</p>
    </div>
    <div class="d-flex flex-row bd-highlight mb-3">
        <form action="{{ route('post.destroy', $item->id) }}" class="form-horizontal" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-link pl-4">Delete</button>
        </form>
        <a class="btn btn-link pl-4 reply" body="{{ $item->body }}" name={{ $item->user->name }} token="{{ csrf_token() }}" pid="{{ $item->id }}">Reply</a>
    </div>
    <div class="pl-4 pr-4">
        <div class="reply-form form-horizontal">
            <!-- Dynamic Reply form -->
        </div>
        @foreach($item->replies as $rep)
            @if($item->id === $rep->post_id)
                <div>
                    <i><b> "{{ $rep->body }}", </b></i>
                    <span> {{ $rep->reply }} </span>
                    <div>
                        <a did="{{ $rep->id }}" class="btn btn-link delete-reply" token="{{ csrf_token() }}" >Delete</a>
                        <a rname="{{ Auth::user()->name }}" rid="{{ $item->id }}" class="btn btn-link reply-to-reply" token="{{ csrf_token() }}">Reply</a>
                    </div>
                </div>
            @endif 
        @endforeach
    </div>
</div>
@endforeach
</div>

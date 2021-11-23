


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
        <form action="" class="form-horizontal" method="post">
            @csrf
            <button type="submit" class="btn btn-link pl-4">Reply</button>
        </form>
    </div>
</div>
@endforeach
</div>

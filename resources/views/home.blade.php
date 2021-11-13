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

                    @csrf
                    <form action="" class="form-horizontal" method="post">
                        <textarea class="form-control" rows="3"></textarea>
                        <button class="btn btn-primary mt-2">Yo post some</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

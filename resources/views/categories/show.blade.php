@extends('layouts.left')

{{-- Left --}}
@section('layouts.left.left')
    <div class="card">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Create Post</h6>

            @include('posts.forms.create', ['category' => $category])
        </div>
    </div>
@endsection

{{-- Main --}}
@section('layouts.left.main')
    <h3>{{ $category->title }}</h3>
    @foreach($posts as $post)
        <div class="row">
            <div class="col-1">
                @include('votes.vote', ['post' => $post])
            </div>

            <div class="col">
                <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                    <div class="font-weight-bold">{{ $post->title }}</div>
                    <div>{{ $post->details }}</div>
                </a>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
@endsection

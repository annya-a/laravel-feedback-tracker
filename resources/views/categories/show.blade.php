@extends('layouts.left')

{{-- Left --}}
@section('layouts.left.left')
    <div class="card">
        <div class="card-header font-weight-bold text-secondary">
            Create Post
        </div>
        <div class="card-body">
            @include('posts.forms.create', ['category' => $category])
        </div>
    </div>
@endsection

{{-- Main --}}
@section('layouts.left.main')
    <h3>{{ $category->title }}</h3>
    @foreach($posts as $post)
        <div class="row mb-4">
            <div class="col-1 pr-0">
                @include('votes.vote', ['post' => $post])
            </div>

            <div class="col pl-0">
                <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="text-dark">
                    <div class="font-weight-bold">{{ $post->title }}</div>
                    <div>{{ $post->details }}</div>
                </a>
            </div>
        </div>
    @endforeach

    {{ $posts->links() }}
@endsection

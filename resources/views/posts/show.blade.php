@extends('layouts.master')

@section('layouts.master.content')
    <div class="row">
        <div class="col-1">
            @include('votes.vote', ['post' => $post])
        </div>

        <div class="col">
            <h3 class="post-subtitle">
                {{ $post->title }}
            </h3>

            <div class="@include('posts.partials.status_class', ['status' => $post->status])">
                @include('posts.partials.status', ['status' => $post->status])
            </div>
        </div>
    </div>

    <div class="row">
          <div class="col offset-1">
            <div class="font-weight-bold">
                {{ $post->user->name }}
            </div>

            <div>
                {{ $post->details }}
            </div>

            <div class="meta text-muted small">
                {{ $post->created_at->format('F d, Y') }}
            </div>
        </div>
    </div>

    @auth
        <div class="row">
            <div class="col offset-1">
                @include('comments.partials.form', ['post' => $post])
            </div>
        </div>
    @endauth

    @include('comments.partials.list', ['comments' => $post->comments])
@endsection

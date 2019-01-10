@extends('layouts.left')

{{-- Sidebar --}}
@section('layouts.left.left')
    <div class="card">
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">Voters</h6>
            @foreach($voters as $voter)
                <div class="row">
                    <div class="col offset-1">
                        {{ $voter->name }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

{{-- Main --}}
@section('layouts.left.main')
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
        <h3 class="text-muted">Comments</h3>
        <div class="row">
            <div class="col offset-1">
                @include('comments.forms.create', ['post' => $post])
            </div>
        </div>
    @endauth

    @include('comments.partials.list', ['comments' => $post->comments])
@endsection

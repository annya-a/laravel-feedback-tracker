@extends('layouts.left', ['page_title' => $post->title])

{{-- Sidebar --}}
@section('layouts.left.left')
    <div class="card">
        <div class="card-header font-weight-bold">
            Voters
        </div>
        <div class="card-body voters-list">
            @foreach($voters as $voter)
                <div class="row voter-item">
                    <div class="col-1">
                        <img class="rounded-circle avatar-sm" src="{{ asset($voter->getFirstMediaUrl('avatar', 'thumb')) }}" />
                    </div>
                    <div class="col">
                        {{ $voter->name }}
                    </div>
                </div>
            @endforeach
        </div>
        @if ($voters_left > 0)
            <div class="card-footer text-muted">
                and {{ $voters_left }} more
            </div>
        @endif
    </div>
@endsection

{{-- Main --}}
@section('layouts.left.main')
    <div class="row">
        <div class="col-1 pr-0">
            @include('votes.vote', ['post' => $post])
        </div>

        <div class="col pl-0">
            <h3 class="post-subtitle">
                {{ $post->title }}
            </h3>

            <div class="@include('posts.partials.status_class', ['status' => $post->status])">
                @include('posts.partials.status', ['status' => $post->status])
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-1 text-center pr-0">
            <img class="rounded-circle avatar-sm" src="{{ asset($post->user->getFirstMediaUrl('avatar', 'thumb')) }}" />
        </div>

        <div class="col pl-0">
            <div class="font-weight-bold">
                {{ $post->user->name }}
            </div>

            <div>
                {{ $post->details }}
            </div>

            <div class="meta text-muted small">
                {{ $post->created_at->diffForHumans() }}
            </div>
        </div>
    </div>

    @auth
        <div class="row">
            <div class="col offset-1 pl-0 mt-3">
                @include('comments.forms.create', ['post' => $post])
            </div>
        </div>
    @endauth

    @if ($post->comments->isNotEmpty())
        <div class="comments-list">
            <div class="row">
                <div class="col offset-1 pl-0">
                    <h3 class="text-muted">Comments</h3>
                </div>
            </div>

            @include('comments.partials.list', ['comments' => $post->comments])
        </div>
    @endif

@endsection

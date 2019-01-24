@extends('layouts.left', ['page_title' => $post->title])

{{-- Sidebar --}}
@section('layouts.left.left')
    <div class="card">
        <div class="card-header font-weight-bold">
            Voters
        </div>
        <div class="card-body voters-list">
            @include('votes::voters.partials.list', ['voters' => $post->voters])
        </div>
        @if ($voters_left > 0)
            <div class="card-footer text-muted">
                <a href="{{ route('posts.voters', ['post' => $post]) }}" class="text-dark">and {{ $voters_left }} more</a>
            </div>
        @endif
    </div>
@endsection

{{-- Main --}}
@section('layouts.left.main')
    <div class="row">
        <div class="col-1 pr-0">
            @include('votes::vote', ['post' => $post])
        </div>

        <div class="col pl-0">
            <h3 class="post-subtitle">
                {{ $post->title }}
            </h3>

            <div class="@include('posts::partials.status_class', ['status' => $post->status])">
                @include('posts::partials.status', ['status' => $post->status])
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
                {{-- @todo Do purifiyng in more clean way. --}}
                {!! clean(nl2br($post->details)) !!}
            </div>

            <div class="meta text-muted small">
                {{ $post->created_at->diffForHumans() }}
            </div>
        </div>
    </div>

    @auth
        <div class="row">
            <div class="col offset-1 pl-0 mt-3">
                @include('comments::forms.create', ['post' => $post])
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

            @include('comments::partials.list', ['comments' => $post->comments])
        </div>
    @endif

@endsection

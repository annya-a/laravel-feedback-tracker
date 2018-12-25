@extends('layouts.master')

@section('layouts.master.content')
    <div>
        {{ $post->title }}
    </div>

    <div>
        @include('posts.partials.status', ['status' => $post->status])
    </div>

    <div>
        {{ $post->user->name }}
    </div>

    <div>
        {{ $post->details }}
    </div>

    <div>
        {{ $post->created_at->format('F d Y') }}
    </div>
@endsection

@extends('layouts.master')

@section('layouts.master.content')
    {{--Categories --}}
    <h3>Give Feedback</h3>

    @foreach($categories->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $category)
                <div class="col col-4">
                    <a href="{{ route('categories.show', $category->id) }}">
                        <div class="row">
                            <div class="col-9">
                                {{ $category->title }}
                            </div>
                            <div class="col">
                                {{ $category->posts_count }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach

    {{-- Roadmap --}}
    <h3>Roadmap</h3>
    <div class="row">
        @foreach($postsByStatus as $status => $posts)
            <div class="col-4">

                <div class="font-weight-bold @include('posts.partials.status_class', ['status' => $status])">
                    @include('posts.partials.status', ['status' => $status])
                </div>

                @foreach($posts as $post)
                    <div class="row">
                        <div class="col-3">
                            @include('votes.vote', ['post' => $post])
                        </div>
                        <div class="col">
                            <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                                <div>{{ $post->title }}</div>
                                <div>{{ $post->category->title }}</div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

@endsection

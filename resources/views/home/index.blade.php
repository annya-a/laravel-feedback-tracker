@extends('layouts.master')

@section('layouts.master.content')
    @foreach($categories->chunk(3) as $chunk)
        <div class="row home-menu-categories">
            @foreach($chunk as $category)
                <div class="col col-4">
                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-block @include('categories::partials.button_class', ['name' => $category->name])">
                        <div class="row">
                            <div class="col-9 text-left font-weight-bold">
                                {{ $category->title }}
                            </div>
                            <div class="col text-right text-small">
                                {{ $category->posts_count }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endforeach

    {{-- Roadmap --}}
    <h3>Issues</h3>
    <div class="row">
        @foreach($postsByStatus as $status => $posts)
            <div class="col-4 home-posts">
                <div class="card">
                    <div class="card-header font-weight-bold text-secondary">
                        @include('posts::partials.status', ['status' => $status])
                    </div>
                    <div class="card-body">


                        @foreach($posts as $post)
                            <div class="row post-item">
                                <div class="col-2">
                                    @include('votes::vote', ['post' => $post])
                                </div>
                                <div class="col">
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                                        <div class="text-dark font-weight-bold">{{ $post->title }}</div>
                                        <div class="text-black-50">{{ $post->category->title }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection

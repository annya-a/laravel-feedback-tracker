@extends('layouts.master')

@section('layouts.master.content')
    <h3>Give Feedback</h3>

    @foreach($categories->chunk(3) as $chunk)
        <div class="row">
            @foreach($chunk as $category)
                <div class="col col-3">
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
@endsection

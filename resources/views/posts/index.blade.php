@extends('layouts.master')

@section('layouts.master.content')
    @foreach($posts as $post)
        <div>
            {{ $post->title }}
        </div>
        <div>
            {{ $post->details }}
        </div>
    @endforeach

    {{ $posts->links() }}
@endsection

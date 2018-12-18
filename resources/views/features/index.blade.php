@extends('layouts.master')

@section('layouts.master.content')
    @foreach($features as $feature)
        <div>
            {{ $feature->title }}
        </div>
        <div>
            {{ $feature->details }}
        </div>
    @endforeach

    {{ $features->links() }}
@endsection

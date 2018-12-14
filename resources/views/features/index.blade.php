@extends('layouts.master')

@section('layouts.master.content')
    @foreach($features['data'] as $feature)
        <div>
            {{ $feature->title }}
        </div>
        <div>
            {{ $feature->details }}
        </div>
    @endforeach
@endsection

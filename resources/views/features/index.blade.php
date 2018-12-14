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

    @isset($features['paginator'])
        @include('layouts.paginator.default', ['paginator' => $features['paginator']])
    @endisset
@endsection

@extends('layouts.master', ['page_title' => $post->title . ' / Voters'])

@section('layouts.master.content')
    <div class="card">
        <div class="card-header font-weight-bold">
            Voters
        </div>
        <div class="card-body voters-list">
            @include('votes::voters.partials.list', ['voters' => $post->voters])
        </div>
@endsection

@extends('layouts.master')

@section('layouts.master.content')
    <div class="row">
        <div class="col col-3">
            @yield('layouts.left.left')
        </div>
        <div class="col">
            @yield('layouts.left.main')
        </div>
    </div>
@endsection

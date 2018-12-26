@extends('layouts.master')

@section('layouts.master.content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        @include('layouts.form.email', [
        'label' => __('E-Mail Address'),
        'name' => 'email',
        'value' => old('email'),
        ])

        {{-- Password --}}
        @include('layouts.form.password', [
        'label' => __('Password'),
        'name' => 'password',
        ])

        {{-- Submit button --}}
        @include('layouts.form.button', [
        'label' => __('Login')
        ])
    </form>

@endsection

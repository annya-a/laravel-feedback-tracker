@extends('layouts.form.element')

@section('layouts.form.element.content')
    @isset($label)
        <label>
            {{ $label }}
        </label>
    @endisset

    <input class="form-control @if ($errors->has($name)) is-invalid @endif"
           name="{{ $name }}"
           type="text"
           value="{{ $value }}"
           @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
    >
@overwrite

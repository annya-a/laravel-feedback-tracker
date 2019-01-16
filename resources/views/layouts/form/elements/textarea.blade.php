@extends('layouts.form.element')

@section('layouts.form.element.content')
    @isset($label)
        <label>
            {{ $label }}
        </label>
    @endisset

    <textarea rows="4"
              class="form-control @if ($errors->has($name)) is-invalid @endif"
              name="{{ $name }}"
              @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
    >@isset($value){{ $value }}@endisset</textarea>
@overwrite

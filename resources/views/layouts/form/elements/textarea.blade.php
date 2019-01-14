@extends('layouts.form.element')

@section('layouts.form.element.content')
    @isset($label)
        <label>
            {{ $label }}
        </label>
    @endisset

    <textarea rows="4" class="form-control" name="{{ $name }}" class="form-control"
              @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
    >@isset($value){{ $value }}@endisset</textarea>
@overwrite

@extends('layouts.form.element')

@section('layouts.form.element.content')
<textarea name="{{ $name }}" class="form-control"
          @isset($placeholder)
          placeholder="{{ $placeholder }}"
        @endisset
>
@isset($value)
    {{ $value }}
@endisset
</textarea>
@overwrite

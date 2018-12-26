@extends('layouts.form.element')

@section('layouts.form.element.content')
<textarea name="{{ $name }}"
          @isset($placeholder)
          placeholder="{{ $placeholder }}"
        @endisset
>
@isset($value)
    {{ $value }}
@endisset
</textarea>
@endsection

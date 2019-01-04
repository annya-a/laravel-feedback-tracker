@extends('layouts.form.element')

@section('layouts.form.element.content')
<label>
    {{ $label }}
</label>

<input name="{{ $name }}" type="email" value="{{ $value }}">
@overwrite

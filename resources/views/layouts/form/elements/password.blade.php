@extends('layouts.form.element')

@section('layouts.form.element.content')
    <label>{{ $label }}</label>
    <input name="{{ $name }}" type="password">
@overwrite

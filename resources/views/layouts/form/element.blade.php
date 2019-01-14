<div class="control-group">
    <div class="form-group floating-label-form-group controls">
        @yield('layouts.form.element.content')
    </div>
</div>

@include('layouts.form.partials.errors', ['name' => $name, 'errors' => $errors])

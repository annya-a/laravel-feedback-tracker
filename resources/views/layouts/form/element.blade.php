<div class="control-group mb-3">
    <div class="form-group floating-label-form-group controls">
        @yield('layouts.form.element.content')
    </div>
    @include('layouts.form.partials.errors', ['name' => $name, 'errors' => $errors])
</div>

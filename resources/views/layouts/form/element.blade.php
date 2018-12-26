@yield('layouts.form.element.content')

@include('layouts.form.partials.errors', ['name' => $name, 'errors' => $errors])

<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    @include('layouts.form.elements.text', [
    'label' => 'Title',
    'name' => 'title',
    'value' => old('title'),
    ])

    @include('layouts.form.elements.textarea', [
    'label' => 'Details',
    'name' => 'details',
    'value' => old('details'),
    ])

    @include('layouts.form.elements.button', [
    'label' => 'Create Post',
    'class' => 'btn-primary',
    ])
</form>

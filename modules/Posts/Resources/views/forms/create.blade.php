<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    @include('layouts.form.elements.text', [
    'placeholder' => __('Title'),
    'name' => 'title',
    'value' => old('title'),
    ])

    @include('layouts.form.elements.textarea', [
    'placeholder' => __('Details'),
    'name' => 'details',
    'value' => old('details'),
    ])

    @include('layouts.form.elements.hidden', ['name' => 'category_id', 'value' => $category->id])

    @include('layouts.form.elements.button', [
    'label' => __('Create Post'),
    'class' => 'btn-primary',
    ])
</form>

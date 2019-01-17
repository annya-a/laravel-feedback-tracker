<form method="POST" action="{{ route('comments.store') }}">
    @csrf

    @include('layouts.form.elements.hidden', ['name' => 'post_id', 'value' => $post->id])

    @include('layouts.form.elements.textarea', [
    'name' => 'text',
    'placeholder' => __('Leave a comment')
    ])

    @include('layouts.form.elements.button', [
    'label' => 'Submit',
    'class' => 'btn-primary',
    ])
</form>

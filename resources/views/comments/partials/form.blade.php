<form method="POST" action="{{ route('comments.store') }}">
    @csrf

    @include('layouts.form.hidden', ['name' => 'post_id', 'value' => $post->id])

    @include('layouts.form.textarea', [
    'name' => 'text',
    'placeholder' => __('Leave a comment')
    ])

    @include('layouts.form.button', ['label' => 'Submit'])
</form>

<form method="POST" action="{{ route('votes.vote') }}">
    @csrf

    <div>
        {{ $post->votes_count }}
    </div>

    @include('layouts.form.elements.hidden', [
    'name' => 'post_id',
    'value' => $post->id,
    ])

    {{-- Submit button --}}
    @include('layouts.form.elements.button', [
    'label' => __('Vote')
    ])
</form>

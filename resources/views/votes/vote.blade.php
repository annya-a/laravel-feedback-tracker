@auth
    <form method="POST" action="{{ route('posts.vote', $post) }}">
        @csrf

        {{-- Vote button --}}
        @include('layouts.form.elements.button', [
        'label' => __('Vote')
        ])

        <div>
            {{ $post->votes_count }}
        </div>
    </form>
@endauth

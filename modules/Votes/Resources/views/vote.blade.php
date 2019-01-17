@auth
    <form method="POST" action="{{ route('posts.vote', $post) }}">
        @csrf

        <button class="btn @can ('vote', $post) btn-slight @endcan btn-middle btn-vote" @cannot('vote', $post) disabled @endcannot>
            <i class="fas @can('vote', $post) fa-caret-up @endcan"></i>
            <div class="text-dark">{{ $post->votes_count }}</div>
        </button>
    </form>
@endauth

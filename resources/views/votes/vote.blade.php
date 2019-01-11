@auth
    <form method="POST" action="{{ route('posts.vote', $post) }}">
        @csrf

        <button class="btn btn-slight btn-middle" data-loading-text=" ... ">
            <i class="fas fa-caret-up"></i>
            <div class="text-dark">{{ $post->votes_count }}</div>
        </button>
    </form>
@endauth

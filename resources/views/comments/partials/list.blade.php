@foreach($comments as $comment)
    <div class="row comment-item">
        <div class="col-1 pr-0 text-center">
            <img class="rounded-circle avatar-sm" src="{{ asset($comment->user->getFirstMediaUrl('avatar', 'thumb')) }}" />
        </div>
        <div class="col pl-0">
            <div class="font-weight-bold">
                {{ $comment->user->name }}
            </div>

            <div>
                {{ $comment->text }}
            </div>
            <div class="meta text-muted small">
                {{ $comment->created_at->format('F d, Y') }}
            </div>
        </div>
    </div>
@endforeach

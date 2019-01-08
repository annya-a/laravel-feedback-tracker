@foreach($comments as $comment)
    <div class="row">
        <div class="col offset-1">
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

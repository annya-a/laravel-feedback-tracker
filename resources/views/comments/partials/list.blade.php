@foreach($comments as $comment)
    <div>
        {{ $comment->user->name }}
    </div>
    <div>
        {{ $comment->text }}
    </div>
    <div>
        {{ $comment->created_at }}
    </div>
@endforeach

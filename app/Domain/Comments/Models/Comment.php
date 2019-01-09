<?php

namespace App\Domain\Comments\Models;

use App\Domain\Posts\Models\Post;
use App\Domain\Users\Models\User;
use App\Core\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'user_id', 'post_id'];

    /**
     * User relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Post relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}

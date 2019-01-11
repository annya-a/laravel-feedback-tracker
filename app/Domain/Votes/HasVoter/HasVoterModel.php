<?php

namespace App\Domain\Votes\HasVoter;

use App\Domain\Posts\Models\Post;

trait HasVoterModel
{
    /**
     * Model vote relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function postVotes()
    {
        return $this->belongsToMany(Post::class, 'votes');
    }
}

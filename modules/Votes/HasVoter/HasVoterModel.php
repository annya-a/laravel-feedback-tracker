<?php

namespace Modules\Votes\HasVoter;

use Modules\Posts\Entities\Post;

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

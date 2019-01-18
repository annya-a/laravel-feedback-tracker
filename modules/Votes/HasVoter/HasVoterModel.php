<?php

namespace Modules\Votes\HasVoter;

use Modules\Posts\Entities\Post;
use Modules\Votes\Entities\Vote;

trait HasVoterModel
{
    /**
     * Model vote relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function postVotes()
    {
        return $this->hasManyThrough(Post::class, Vote::class, 'user_id', 'id', 'id', 'post_id');
    }
}

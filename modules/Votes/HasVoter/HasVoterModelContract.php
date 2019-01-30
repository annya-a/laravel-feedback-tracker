<?php

namespace Modules\Votes\HasVoter;


use Illuminate\Support\Collection;

interface HasVoterModelContract
{
    /**
     * Model vote relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function postVotes();

    /**
     * Check if user has votes for specific posts.
     * @param array $postsIds
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function hasPostsVotes(Collection $postsIds);
}

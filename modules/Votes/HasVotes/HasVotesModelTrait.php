<?php

namespace Modules\Votes\HasVotes;
use Modules\Users\Entities\User;
use Modules\Votes\Entities\Vote;

trait HasVotesModelTrait
{
    /**
     * Votes relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * Voters relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function voters()
    {
        return $this->belongsToMany(User::class, 'votes');
    }
}

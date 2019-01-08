<?php

namespace App\Domain\Votes\HasVotes;
use App\Domain\Users\Models\User;
use App\Domain\Votes\Models\Vote;

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

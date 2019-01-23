<?php

namespace Modules\Votes\HasVotes;


interface HasVotesModelContract
{
    /**
     * Votes relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes();

    /**
     * Voters relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function voters();

    /**
     * Voter relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function userVoter();
}

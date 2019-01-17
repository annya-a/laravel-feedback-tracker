<?php

namespace Modules\Votes\HasVoter;


interface HasVoterModelContract
{
    /**
     * Model vote relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function postVotes();
}
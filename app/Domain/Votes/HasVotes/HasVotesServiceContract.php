<?php

namespace App\Domain\Votes\HasVotes;


interface HasVotesServiceContract
{
    /**
     * Add votes count to model.
     *
     * @return $this
     */
    public function withVotes();
}

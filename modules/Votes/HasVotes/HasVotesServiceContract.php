<?php

namespace Modules\Votes\HasVotes;


interface HasVotesServiceContract
{
    /**
     * Add votes count to model.
     *
     * @return $this
     */
    public function withVotes();

    /**
     * Count voters for model.
     *
     * @param int $id
     * @return int
     */
    public function countVoters(int $id);
}

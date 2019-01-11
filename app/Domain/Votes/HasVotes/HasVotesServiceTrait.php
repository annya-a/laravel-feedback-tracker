<?php

namespace App\Domain\Votes\HasVotes;

use Illuminate\Database\Eloquent\Builder;

trait HasVotesServiceTrait
{
    /**
     * Builder
     *
     * @var Builder
     */
    protected $builder;

    /**
     * Add votes count to model.
     *
     * @return $this
     */
    public function withVotes()
    {
        $this->builder->withCount('votes');

        return $this;
    }

    /**
     * Count voters for model.
     *
     * @param int $id
     * @return int
     */
    public function countVoters(int $id)
    {
        return $this->builder->withCount('voters')->find($id)->voters_count;
    }
}

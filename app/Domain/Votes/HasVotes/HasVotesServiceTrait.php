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

    public function getVoters(int $id)
    {
        return $this->builder->find($id)->voters;
    }
}

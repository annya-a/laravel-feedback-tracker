<?php

namespace Modules\Votes\HasVotes;

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

    /**
     * Load voter by user_id.
     *
     * @param $user_id
     * @return $this
     */
    public function withUserVoter($user_id)
    {
        $this->builder->with(['userVoter' => function($query) use ($user_id) {
            $query->where('user_id', $user_id);
        }]);

        return $this;
    }
}

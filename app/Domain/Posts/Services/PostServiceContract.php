<?php

namespace App\Domain\Posts\Services;

use App\Core\Services\BasicServiceContract;
use App\Domain\Votes\HasVotes\HasVotesServiceContract;

interface PostServiceContract extends BasicServiceContract, HasVotesServiceContract
{
    /**
     * Planned status.
     *
     * @var string.
     */
    const STATUS_PLANNED = 0;

    /**
     * In progress status.
     *
     * @var string.
     */
    const STATUS_IN_PROGRESS = 1;

    /**
     * In completed status.
     *
     * @var string.
     */
    const STATUS_COMPLETED = 2;

    /**
     * Get collection of posts by status.
     *
     * @param $status
     * @param int $limit
     * @return mixed
     */
    public function getListByStatus($status, int $limit = 0);
}

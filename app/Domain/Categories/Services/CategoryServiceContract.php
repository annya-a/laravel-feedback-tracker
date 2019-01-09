<?php

namespace App\Domain\Categories\Services;

use App\Core\Services\BasicServiceContract;

interface CategoryServiceContract extends BasicServiceContract
{
    /**
     * Get collection of categories.
     *
     * @param int $limit
     * @return mixed
     */
    public function getList(int $limit = 0);
}

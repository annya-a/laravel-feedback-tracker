<?php

namespace Modules\Categories\Services;

use App\Core\Services\BasicServiceContract;

interface CategoryServiceContract extends BasicServiceContract
{
    /**
     * Get collection of categories.
     *
     * @param int $limit
     * @return mixed
     */
    public function getCategories(int $limit = 0);
}

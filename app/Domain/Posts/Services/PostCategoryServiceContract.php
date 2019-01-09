<?php

namespace App\Domain\Posts\Services;

use App\Core\Services\BasicServiceContract;

interface PostCategoryServiceContract extends BasicServiceContract
{
    /**
     * Get collection of posts by category,
     *
     * @var $category_id
     */
    public function getPostsByCategoryPaginated($category_id, $limit);
}

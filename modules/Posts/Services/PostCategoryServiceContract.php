<?php

namespace Modules\Posts\Services;

use App\Core\Services\BasicServiceContract;
use Modules\Votes\HasVotes\HasVotesServiceContract;

interface PostCategoryServiceContract extends BasicServiceContract, HasVotesServiceContract
{
    /**
     * Get collection of posts by category,
     *
     * @var $category_id
     */
    public function getPostsByCategoryPaginated($category_id, $limit);
}

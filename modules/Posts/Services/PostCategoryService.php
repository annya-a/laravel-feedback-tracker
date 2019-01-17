<?php

namespace Modules\Posts\Services;

use App\Core\Services\BasicService;
use Modules\Posts\Entities\Post;

class PostCategoryService extends BasicService implements PostCategoryServiceContract
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    protected function model()
    {
        return Post::class;
    }

    /**
     * Get collection of posts by category,
     *
     * @var $category_id
     */
    public function getPostsByCategoryPaginated($category_id, $limit)
    {
        $result = $this->builder->where('category_id', $category_id)
            ->orderBy('created_at')
            ->paginate($limit);

        $this->resetBuilder();

        return $result;
    }
}

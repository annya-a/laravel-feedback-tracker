<?php

namespace App\Domain\Categories\Services;

use App\Core\Services\BasicService;
use App\Domain\Categories\Models\Category;

class CategoryService extends BasicService implements CategoryServiceContract
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    protected function model()
    {
        return Category::class;
    }

    /**
     * Get collection of categories.
     *
     * @param int $limit
     * @return mixed
     */
    public function getCategories(int $limit = 0)
    {
        if ($limit) {
            $this->builder->limit($limit);
        }

        $result = $this->builder->orderBy('title', 'asc')->get();

        $this->resetBuilder();

        return $result;
    }
}

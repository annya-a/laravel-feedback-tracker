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
}

<?php

namespace App\Core\Services;

use Illuminate\Container\Container as App;
use App\Core\Database\Eloquent\Builder;
use App\Core\Database\Eloquent\Model;

abstract class BasicService implements BasicServiceContract
{
    /**
     * @var App
     */
    private $app;

    /**
     * Builder
     *
     * @var Builder
     */
    protected $builder;

    /**
     * @param App $app
     * @throws \Exception
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeBuilder();
    }


    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract protected function model();

    /**
     * Reset builder after we finish operation.
     *
     * @throws \Exception
     */
    public function resetBuilder()
    {
        $this->makeBuilder();
    }

    /**
     * Make model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws \Exception
     */
    public function makeBuilder() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->builder = $model->newQuery();
    }

    /**
     * Find model by id or fail.
     *
     * @var $id
     */
    public function findOrFail($id)
    {
        $result = $this->builder->findOrFail($id);

        $this->resetBuilder();

        return $result;
    }

    /**
     * Create model.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->builder->create($attributes);
    }

    /**
     * Load relations.
     *
     * @var array|string $relations
     *
     * @return $this
     */
    public function with($relations)
    {
        $this->builder->with($relations);

        return $this;
    }

    /**
     * Load relations with limit.
     *
     *
     * @var array|string $relations
     * @param int $limit
     * @return $this
     */
    public function withLimit($relations, $limit = 0)
    {
        $this->builder->with([$relations => function($query) use ($limit) {
            $query->limit($limit);
        }]);

        return $this;
    }

    /**
     * Load count relations.
     *
     * @var array|string $relations
     * @return $this
     */
    public function withCount($relations)
    {
        $this->builder->withCount($relations);

        return $this;
    }
}

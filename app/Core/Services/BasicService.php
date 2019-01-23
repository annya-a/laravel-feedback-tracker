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

    /**
     * Load relations with conditions.
     * @param $relation
     * @param string $sort
     * @param null $limit
     *
     * @return $this
     */
    public function withConditions($relation, $order = [], $limit = null)
    {
        $this->builder->with([$relation => function ($query) use ($order, $limit) {
            // Set order.
            if (!empty($order)) {
                $query->orderBy($order['column'], $order['direction']);
            }

            // Set limit.
            if (!empty($limit)) {
                $query->limit($limit);
            }
        }]);

        return $this;
    }

    /**
     * Add order by.
     *
     * @var string $column
     * @var string $direction = 'asc'
     * @return $this
     */
    public function orderBy($column, $direction = 'asc')
    {
        $this->builder->orderBy($column, $direction);

        return $this;
    }
}

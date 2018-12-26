<?php

namespace App\Core\Services;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
     * Paginate the given query.
     *
     * @param  int $perPage
     * @param  array $columns
     * @param  string $pageName
     * @param  int|null $page
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $result = $this->builder->paginate($perPage);

        $this->resetBuilder();

        return $result;
    }

    /**
     * Find or fail model by id.
     *
     * @param $id
     * @return Builder|Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function findOrFail($id)
    {
        $result = $this->builder->findOrFail($id);

        $this->resetBuilder();

        return $result;
    }

    /**
     * Save a new entity in repository
     *
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        $result = $this->builder->create($attributes);

        $this->resetBuilder();

        return $result;
    }

    /**
     * Delete the first record matching the attributes or create it.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function deleteOrCreate(array $attributes, array $values = [])
    {
        if (! is_null($instance = $this->builder->where($attributes)->first())) {
            return $instance->delete();
        }

        return tap($this->builder->newModelInstance($attributes + $values), function ($instance) {
            $instance->save();
        });
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
}

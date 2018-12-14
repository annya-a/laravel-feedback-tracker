<?php

namespace Core\Services;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Core\Dto\BasicPaginatorDto;
use Core\Dto\BasicModelCollectionDto;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
     * Collection DTO.
     *
     * @var BasicModelCollectionDto
     */
    protected $collection_dto;

    /**
     * Paginator DTO.
     *
     * @var BasicPaginatorDto
     */
    protected $paginator_dto;

    /**
     * @param App $app
     * @throws \Exception
     */
    public function __construct(App $app) {
        $this->app = $app;
        $this->makeModel();
        $this->paginator_dto = $this->paginatorDto();
        $this->collection_dto = $this->modelCollectionDto();
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract protected function model();

    /**
     * Paginate the given query.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return array
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null)
    {
        $result = $this->builder->paginate($perPage);

        return $this->dtoFormat($result);
    }

    /**
     * Return output in DTO format.
     *
     * @param LengthAwarePaginator $result
     * @return array
     */
    public function dtoFormat($result)
    {
        return[
            'data' => $this->collection_dto::create($result->items()),
            'paginator' => $this->paginator_dto::create($result),
        ];
    }

    /**
     * Make model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws \Exception
     */
    protected function makeModel() {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->builder = $model->newQuery();
    }

    /**
     * Get paginator DTO.
     *
     * @return string
     */
    protected function paginatorDto() {
        return BasicPaginatorDto::class;
    }

    /**
     * Model collection DTO class.
     *
     * @return string
     */
    protected function modelCollectionDto() {
        return BasicModelCollectionDto::class;
    }
}

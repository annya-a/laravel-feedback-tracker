<?php

namespace Core\Dto;

use Illuminate\Database\Eloquent\Model;

class BasicModelDto implements BasicModelDtoContract
{
    /**
     * Model.
     *
     * @var Model
     */
    protected $model;

    /**
     * Create DTO object.
     *
     * @param Model $model
     * @return BasicModelDto
     */
    public static function create(Model $model)
    {
        return new static($model);
    }

    /**
     * BasicModelDto constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = (object) $model->toArray();
    }

    /**
     * Get property instance.
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->model->{$name};
    }
}

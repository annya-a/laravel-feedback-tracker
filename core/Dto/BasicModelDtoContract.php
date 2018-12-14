<?php

namespace Core\Dto;

use Illuminate\Database\Eloquent\Model;

interface BasicModelDtoContract
{
    /**
     * Create DTO object.
     *
     * @param Model $model
     * @return BasicModelDto
     */
    public static function create(Model $model);
}

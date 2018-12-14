<?php

namespace Core\Dto;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface BasicPaginatorDtoContract
{
    /**
     * Create DTO object.
     *
     * @param LengthAwarePaginator $paginator
     * @return BasicModelDto
     */
    public static function create(LengthAwarePaginator $paginator);
}

<?php

namespace Core\Dto;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BasicPaginatorDto implements BasicPaginatorDtoContract
{
    /**
     * Pager.
     *
     * @var array
     */
    protected $paginator;

    /**
     * Create DTO object.
     *
     * @param LengthAwarePaginator $paginator
     * @return BasicPaginatorDto
     */
    public static function create(LengthAwarePaginator $paginator)
    {
        return new static($paginator);
    }

    /**
     * BasicModelDto constructor.
     * LengthAwarePaginator $paginator
     */
    public function __construct(LengthAwarePaginator $paginator)
    {
        $data = $paginator->toArray();
        unset($data['data']);
        $this->paginator = (object) $data;
    }

    /**
     * Get property instance.
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->paginator->{$name};
    }
}

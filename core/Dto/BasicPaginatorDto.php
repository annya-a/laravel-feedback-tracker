<?php

namespace Core\Dto;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Exception;
use Illuminate\Pagination\UrlWindow;

class BasicPaginatorDto implements BasicPaginatorDtoContract
{
    /**
     * List of hidden properties.
     */
    protected $hidden = ['original_paginator'];

    /**
     * Pager.
     *
     * @var array
     */
    protected $paginator;

    /**
     * Original paginator.
     *
     * @var LengthAwarePaginator;
     */
    protected $original_paginator;

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
        $this->original_paginator = $paginator;

        $data = $paginator->toArray();

        $data['elements'] = $this->elements();

        unset($data['data']);

        $this->paginator = (object) $data;
    }

    /**
     * Get property instance.
     *
     * @param string $name
     * @return mixed
     * @throws Exception
     */
    public function __get(string $name)
    {
        if (in_array($name, $this->hidden)) {
            throw new Exception("Property {$name} can't be retrieved, because it is hidden.");
        }

        return $this->paginator->{$name};
    }

    /**
     * Get the array of elements to pass to the view.
     *
     * @return array
     */
    protected function elements()
    {
        $window = UrlWindow::make($this->original_paginator);

        return array_filter([
            $window['first'],
            is_array($window['slider']) ? '...' : null,
            $window['slider'],
            is_array($window['last']) ? '...' : null,
            $window['last'],
        ]);
    }
}

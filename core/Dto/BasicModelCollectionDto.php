<?php

namespace Core\Dto;

use Illuminate\Support\Collection;

class BasicModelCollectionDto extends Collection implements BasicModelCollectionDtoContract
{
    /**
     * Create DTO object.
     *
     * @param array $collection
     * @return BasicModelCollectionDto
     */
    public static function create(array $collection)
    {
        return new static($collection);
    }

    /**
     * Constructor.
     * @param array $collection
     */
    public function __construct(array $collection)
    {
        foreach ($collection as $key => $item) {
            $data[$key] = BasicModelDto::create($item);
        }

        parent::__construct($data);
    }
}

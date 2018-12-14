<?php

namespace Core\Dto;


interface BasicModelCollectionDtoContract
{
    /**
     * Create DTO object.
     *
     * @param array $collection
     * @return BasicModelCollectionDtoContract
     */
    public static function create(array $collection);
}

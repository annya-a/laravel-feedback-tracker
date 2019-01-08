<?php

namespace App\Core\Services;


interface BasicServiceContract
{
    /**
     * Reset builder after we finish operation.
     *
     * @throws \Exception
     */
    public function resetBuilder();

    /**
     * Make model.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * @throws \Exception
     */
    public function makeBuilder();

    /**
     * Delete the first record matching the attributes or create it.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function deleteOrCreate(array $attributes, array $values = []);

    /**
     * Load relations.
     *
     * @var array|string $relations
     * @return $this
     */
    public function with($relations);
}

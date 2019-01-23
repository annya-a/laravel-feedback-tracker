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
     * Find model by id or fail.
     *
     * @var $id
     */
    public function findOrFail($id);

    /**
     * Create model.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Load relations.
     *
     * @var array|string $relations
     * @return $this
     */
    public function with($relations);

    /**
     * Load count relations.
     *
     * @var array|string $relations
     * @return $this
     */
    public function withCount($relations);

    /**
     * Load relations with conditions.
     * @param $relation
     * @param string $sort
     * @param null $limit
     *
     * @return $this
     */
    public function withConditions($relation, $sort = [], $limit = null);

    /**
     * Add order by.
     *
     * @var string $column
     * @var string $direction = 'asc'
     * @return $this
     */
    public function orderBy($column, $direction = 'asc');
}

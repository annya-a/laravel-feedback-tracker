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
     * Load relations with limit.
     *
     *
     * @var array|string $relations
     * @param int $limit
     * @return $this
     */
    public function withLimit($relations, $limit = 0);

    /**
     * Load count relations.
     *
     * @var array|string $relations
     * @return $this
     */
    public function withCount($relations);
}

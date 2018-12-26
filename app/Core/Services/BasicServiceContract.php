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
     * Paginate the given query.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function paginate($perPage = null, $columns = ['*'], $pageName = 'page', $page = null);

    /**
     * Find model ir fail.
     *
     * @param integer $id
     * @return mixed
     */
    public function findOrFail($id);

    /**
     * Save a new entity in repository
     *
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

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

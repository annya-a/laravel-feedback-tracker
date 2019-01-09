<?php

namespace App\Core\Database\Eloquent;

use Illuminate\Database\Eloquent\Builder as BasicBuilder;

class Builder extends BasicBuilder
{
    /**
     * Delete the first record matching the attributes or create it.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function deleteOrCreate(array $attributes, array $values = [])
    {
        if (! is_null($instance = $this->where($attributes)->first())) {
            return $instance->delete();
        }

        return tap($this->newModelInstance($attributes + $values), function ($instance) {
            $instance->save();
        });
    }
}

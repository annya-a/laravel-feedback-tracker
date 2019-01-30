<?php

namespace Modules\Votes\Entities;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['post_id', 'user_id'];

    /**
     * Delete the first record matching the attributes or create it.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public static function deleteOrCreate(array $attributes, array $values = [])
    {
        if (! is_null($instance = static::where($attributes)->first())) {
            return $instance->delete();
        }

        return tap(static::create($attributes + $values), function ($instance) {
            $instance->save();
        });
    }
}

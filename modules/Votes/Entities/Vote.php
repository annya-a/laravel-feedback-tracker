<?php

namespace Modules\Votes\Entities;

use App\Core\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['post_id', 'user_id'];
}
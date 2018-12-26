<?php

namespace App\Domain\Votes\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['post_id', 'user_id'];
}

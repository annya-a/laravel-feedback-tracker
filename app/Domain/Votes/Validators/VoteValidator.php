<?php

namespace App\Domain\Votes\Validators;

use \Prettus\Validator\LaravelValidator;

class VoteValidator extends LaravelValidator {

    protected $rules = [
        'post_id' => [
            'reqired' => 'required',
            'exists' => 'exists:posts,id',
        ],
    ];
}
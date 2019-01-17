<?php

namespace Modules\Votes\Validators;

use \Prettus\Validator\LaravelValidator;

class VoteValidator extends LaravelValidator {

    protected $rules = [
        'post' => [
            'required' => 'required',
            'exists' => 'exists:posts,id',
        ],
    ];
}

<?php

namespace App\Domain\Comments\Validators;

use \Prettus\Validator\LaravelValidator;

class CommentValidator extends LaravelValidator {

    protected $rules = [
        'text' => [
            'required' => 'required',
            'string' => 'string',
            'min:5' => 'min:5',
        ],
    ];
}

<?php

namespace Modules\Posts\Validators;

use \Prettus\Validator\LaravelValidator;

class PostValidator extends LaravelValidator {

    protected $rules = [
        'title' => [
            'required' => 'required',
            'string' => 'string',
        ],
        'details' => [
            'required' => 'required',
            'string' => 'string',
        ],
        'category_id' => [
            'required' => 'required',
            'exists' => 'exists:categories,id'
        ]
    ];
}


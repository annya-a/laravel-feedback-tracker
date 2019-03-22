<?php

namespace Modules\Posts\Validators;

use \Prettus\Validator\LaravelValidator;

class PostValidator extends LaravelValidator {

    protected $rules = [
        'title' => [
            'required' => 'required',
            'string' => 'string',
            'min' => 'min:5',
        ],
        'details' => [
            'required' => 'required',
            'string' => 'string',
            'min' => 'min:5',
        ],
        'category_id' => [
            'required' => 'required',
            'exists' => 'exists:categories,id'
        ]
    ];
}


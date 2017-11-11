<?php

namespace Portfolio\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class TechnologyValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'required|string|min:2|unique:technologies' => 'name=>required|string|min:2|unique:technologies',
            'required|string'                           => 'image_path=>required|string',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'required|string|min:2' => 'name=>required|string|min:2',
            'required|string'       => 'image_path=>required|string',
        ],
    ];

}

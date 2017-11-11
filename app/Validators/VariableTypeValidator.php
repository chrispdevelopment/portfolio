<?php

namespace Portfolio\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class VariableTypeValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'required|string|min:2|unique:variable_types' => 'name=>required|string|min:2|unique:variable_types',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'required|string|min:2' => 'name=>required|string|min:2',
        ],
    ];

}

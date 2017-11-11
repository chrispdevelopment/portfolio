<?php

namespace Portfolio\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class LanguageValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'required|string|min:2|unique:languages' => 'name=>required|string|min:2|unique:languages',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'required|string|min:2' => 'name=>required|string|min:2',
        ],
    ];

}

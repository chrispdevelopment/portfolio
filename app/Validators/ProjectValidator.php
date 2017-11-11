<?php

namespace Portfolio\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'required|exists:languages'             => 'language_id=>required|exists:languages',
            'required|string|min:2|unique:projects' => 'name=>required|string|min:2|unique:projects',
            'required|string'                       => 'site_link=>required|string',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'required|exists:languages' => 'language_id=>required|exists:languages',
            'required|string|min:2'     => 'name=>required|string|min:2',
            'required|string'           => 'site_link=>required|string',
        ],
    ];

}

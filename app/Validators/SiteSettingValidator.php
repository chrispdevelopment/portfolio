<?php

namespace Portfolio\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class SiteSettingValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'required|exists:variable_types'             => 'variable_type_id=>required|exists:variable_types',
            'required|string|min:2|unique:site_settings' => 'name=>required|string|min:2|unique:site_settings',
            'required|string'                            => 'value=>required|string',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'required|exists:variable_types' => 'variable_type_id=>required|exists:variable_types',
            'required|string|min:2'          => 'name=>required|string|min:2',
            'required|string'                => 'value=>required|string',
        ],
    ];

}

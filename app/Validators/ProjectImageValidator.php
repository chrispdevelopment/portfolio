<?php

namespace Portfolio\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class ProjectImageValidator extends LaravelValidator {

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'required|exists:projects' => 'project_id=>required|exists:projects',
            'required|string'          => 'image_path=>required|string',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'required|exists:projects' => 'project_id=>required|exists:projects',
            'required|string'          => 'image_path=>required|string',
        ],
    ];

}

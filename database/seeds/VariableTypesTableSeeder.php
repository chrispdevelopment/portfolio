<?php

use Portfolio\Entities\VariableType;

class VariableTypesTableSeeder extends BaseSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->truncate('variable_types');

        VariableType::create([
            'name' => 'string'
        ]);

        VariableType::create([
            'name' => 'integer'
        ]);

        VariableType::create([
            'name' => 'float'
        ]);

        VariableType::create([
            'name' => 'boolean'
        ]);

        VariableType::create([
            'name' => 'array'
        ]);

        VariableType::create([
            'name' => 'object'
        ]);

        VariableType::create([
            'name' => 'null'
        ]);

        VariableType::create([
            'name' => 'resource'
        ]);

    }

}

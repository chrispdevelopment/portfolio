<?php

use Portfolio\Entities\Language;

class LanguagesTableSeeder extends BaseSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->truncate('languages');

        Language::create([
            'name' => 'PHP'
        ]);

        Language::create([
            'name' => 'Javascript'
        ]);

        Language::create([
            'name' => 'HTML + CSS'
        ]);

        Language::create([
            'name' => 'C#'
        ]);

        Language::create([
            'name' => 'Visual Basic .NET'
        ]);

        Language::create([
            'name' => 'Java'
        ]);

        Language::create([
            'name' => 'C++'
        ]);

        Language::create([
            'name' => 'Apex\Oracle'
        ]);

    }

}

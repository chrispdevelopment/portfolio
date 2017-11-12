<?php

use Portfolio\Entities\SiteSetting;
use Faker\Factory as Faker;

class SiteSettingsTableSeeder extends BaseSeeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->truncate('site_settings');

        $faker = Faker::create('en_GB');

        SiteSetting::create([
            'variable_type_id' => 1,
            'name'             => 'logo_image',
            'value'            => '<?>'
        ]);

        SiteSetting::create([
            'variable_type_id' => 1,
            'name'             => 'title',
            'value'            => 'Christopher Pratt'
        ]);

        SiteSetting::create([
            'variable_type_id' => 1,
            'name'             => 'sub_title',
            'value'            => 'Software Engineer'
        ]);

        SiteSetting::create([
            'variable_type_id' => 1,
            'name'             => 'intro',
            'value'            => $faker->paragraph()
        ]);

        SiteSetting::create([
            'variable_type_id' => 1,
            'name'             => 'extra_info',
            'value'            => $faker->paragraph()
        ]);

    }

}

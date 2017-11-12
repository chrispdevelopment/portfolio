<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $this->call(VariableTypesTableSeeder::class);
        $this->command->info('Seeded the variable types!');

        $this->call(SiteSettingsTableSeeder::class);
        $this->command->info('Seeded the site settings!');

        $this->call(LanguagesTableSeeder::class);
        $this->command->info('Seeded the languages!');

        $this->call(ProjectsTableSeeder::class);
        $this->command->info('Seeded the projects!');

    }

}

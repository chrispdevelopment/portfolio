<?php

use Illuminate\Database\Seeder;

abstract class BaseSeeder extends Seeder {

    /**
     * @param string $tableName
     */
    public function truncate(string $tableName) {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table($tableName)->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('variable_type_id', false, true);
            $table->string('name', 255)->unique();
            $table->string('value', 255);

            $table->foreign('variable_type_id')
                ->references('id')
                ->on('variable_types')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('site_settings');
    }

}

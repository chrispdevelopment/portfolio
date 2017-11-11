<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('language_id', false, true);
            $table->string('name')->unique();
            $table->text('description');
            $table->string('git_link')->nullable();
            $table->string('site_link')->nullable();

            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
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
        Schema::dropIfExists('projects');
    }

}

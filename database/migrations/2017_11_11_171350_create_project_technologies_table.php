<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTechnologiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('project_technologies', function (Blueprint $table) {
            $table->integer('project_id', false, true);
            $table->integer('technology_id', false, true);

            $table->primary(['project_id', 'technology_id']);

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onUpdate('CASCADE')
                ->onDelete('RESTRICT');

            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
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

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::dropIfExists('project_technologies');

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }

}

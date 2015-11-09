<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('facultad_id')->unsigned();
            $table->string('name');
        });
        Schema::table('classrooms', function(Blueprint $table) {
            $table->foreign('facultad_id')
                  ->references('id')
                  ->on('facultades')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classrooms', function(Blueprint $table) {
            $table->dropForeign('classrooms_facultad_id_foreign');
        });
        Schema::drop('classrooms');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('classroom_id')->unsigned();
            $table->integer('professor_id')->unsigned();
            $table->integer('group_id')->unsigned();
            $table->enum('type',['Theory','Practice','Lab']);
            $table->enum('status',['WAITING','CANCELED','ON_COURSE']);
            $table->timestamps();
        });

        Schema::table('classes', function(Blueprint $table) {
            $table->foreign('classroom_id')
                  ->references('id')
                  ->on('classrooms')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('professor_id')
                  ->references('id')
                  ->on('professors')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreign('group_id')
                  ->references('id')
                  ->on('groups')
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
        Schema::table('classes', function(Blueprint $table) {
            $table->dropForeign('classes_classroom_id_foreign');
            $table->dropForeign('classes_professor_id_foreign');
            $table->dropForeign('classes_group_id_foreign');
        });

        Schema::drop('classes');
    }
}

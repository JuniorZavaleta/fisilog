<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesOpenedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_opened', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('professor_id')->unsigned();
            $table->integer('academic_cycle_id')->unsigned();
        });
        Schema::table('courses_opened', function(Blueprint $table) {
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('professor_id')
                  ->references('id')
                  ->on('professors')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('academic_cycle_id')
                  ->references('id')
                  ->on('academic_cycles')
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
        Schema::table('courses_opened', function(Blueprint $table) {
            $table->dropForeign('courses_opened_course_id_foreign');
            $table->dropForeign('courses_opened_professor_id_foreign');
            $table->dropForeign('courses_opened_academic_cycle_id_foreign');
        });
        Schema::drop('courses_opened');
    }
}

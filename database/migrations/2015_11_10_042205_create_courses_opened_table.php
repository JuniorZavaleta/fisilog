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
        Schema::create('courses_opened', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('professor_id');
            $table->unsignedInteger('academic_period_id');

            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('professor_id')->references('id')->on('professors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses_opened', function (Blueprint $table) {
            $table->dropForeign('courses_opened_course_id_foreign');
            $table->dropForeign('courses_opened_professor_id_foreign');
        });

        Schema::drop('courses_opened');
    }
}

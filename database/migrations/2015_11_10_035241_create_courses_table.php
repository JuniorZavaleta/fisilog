<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('academic_plan_id');
            $table->string('name');
            $table->string('code');
            $table->integer('quantity_of_credits');
            $table->unsignedInteger('course_type_id');
            $table->integer('ciclo');

            $table->foreign('academic_plan_id')->references('id')->on('academic_plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign('courses_academic_plan_id_foreign');
        });

        Schema::drop('courses');
    }
}

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
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('classroom_id');
            $table->unsignedInteger('professor_id');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('course_id');
            $table->time('start_hour');
            $table->time('end_hour');
            $table->char('day', 1);
            $table->char('type', 1);
            $table->timestamps();

            $table->foreign('classroom_id')->references('id')->on('classrooms');
            $table->foreign('professor_id')->references('id')->on('professors');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign('classes_classroom_id_foreign');
            $table->dropForeign('classes_professor_id_foreign');
            $table->dropForeign('classes_group_id_foreign');
        });

        Schema::drop('classes');
    }
}

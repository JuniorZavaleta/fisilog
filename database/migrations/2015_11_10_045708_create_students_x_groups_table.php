<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsXGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_x_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('group_id');

            $table->foreign('student_id')->references('id')->on('students');
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
        Schema::table('students_x_groups', function (Blueprint $table) {
            $table->dropForeign('students_x_groups_student_id_foreign');
            $table->dropForeign('students_x_groups_group_id_foreign');
        });

        Schema::drop('students_x_groups');
    }
}

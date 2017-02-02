<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger('school_id');
            $table->string('code');
            $table->integer('year_of_entry');

            $table->primary('id');
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('school_id')->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_id_foreign');
            $table->dropForeign('students_school_id_foreign');
        });

        Schema::drop('students');
    }
}

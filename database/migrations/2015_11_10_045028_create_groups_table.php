<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('course_opened_id')->unsigned();
            $table->integer('number_of_group');
        });
        Schema::table('groups', function(Blueprint $table) {
            $table->foreign('course_opened_id')
                  ->references('id')
                  ->on('courses_opened')
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
        Schema::table('groups', function(Blueprint $table) {
            $table->dropForeign('groups_course_opened_id_foreign');
        });
        Schema::drop('groups');
    }
}

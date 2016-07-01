<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{

   public function up()
   {
      Schema::create('students', function(Blueprint $table) {
         $table->integer('id')->unsigned();
         $table->integer('school_id')->unsigned();
         $table->string('code');
         $table->integer('year_of_entry');
      });

      Schema::table('students', function(Blueprint $table) {
         $table->primary('id');

         $table->foreign('id')
               ->references('id')
               ->on('users')
               ->onUpdate('cascade')
               ->onDelete('cascade');

         $table->foreign('school_id')
               ->references('id')
               ->on('schools')
               ->onUpdate('cascade')
               ->onDelete('cascade');
      });
   }

   public function down()
   {
      Schema::table('students', function(Blueprint $table) {
         $table->dropForeign('students_id_foreign');
         $table->dropForeign('students_school_id_foreign');
      });

      Schema::drop('students');
   }
}

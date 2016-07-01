<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourseIdFkToClassesTable extends Migration
{

   public function up()
   {
      Schema::table('classes', function(Blueprint $table) {
         $table->integer('course_id')->unsigned();
      });

      Schema::table('classes', function(Blueprint $table) {
         $table->foreign('course_id')
               ->references('id')
               ->on('courses')
               ->onUpdate('cascade')
               ->onDelete('cascade');
     });
   }

   public function down()
   {
      Schema::table('classes', function(Blueprint $table) {
         $table->dropForeign('classes_course_id_foreign');
      });

      Schema::table('classes', function(Blueprint $table) {
         $table->dropColumn('course_id');
      });
   }

}

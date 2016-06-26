<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkCourseTypeIdToCoursesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('courses', function(Blueprint $table) {
         $table->foreign('course_type_id')
               ->references('id')
               ->on('course_types')
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
      Schema::table('courses', function(Blueprint $table) {
         $table->dropForeign('courses_course_type_id_foreign');
      });
   }
}

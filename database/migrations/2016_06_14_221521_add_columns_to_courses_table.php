<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCoursesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::table('courses', function(Blueprint $table) {
         $table->integer('course_type_id')->unsigned();
         $table->integer('ciclo');
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
         $table->dropColumn('course_type_id');
         $table->dropColumn('ciclo');
      });
   }
}

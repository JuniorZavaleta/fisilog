<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnAcademicCycleIdOfCoursesOpenedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::table('courses_opened', function (Blueprint $table){
         $table->dropForeign('courses_opened_academic_cycle_id_foreign');
         $table->dropColumn('academic_cycle_id');
      });

      Schema::table('courses_opened', function (Blueprint $table){
         $table->integer('academic_period_id')->unsigned();
      });

      Schema::table('courses_opened', function (Blueprint $table){
         $table->foreign('academic_period_id')
               ->references('id')
               ->on('academic_periods')
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

   }
}

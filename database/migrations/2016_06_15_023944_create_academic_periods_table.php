<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::create('academic_periods', function(Blueprint $table){
         $table->increments('id');
         $table->string('name');
         $table->date('start_date');
         $table->date('end_date');
         $table->integer('facultad_id')->unsigned()->nullable();
         $table->foreign('facultad_id')
               ->references('id')
               ->on('facultades')
               ->onDelete('cascade')
               ->onUpdate('cascade');
      });
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      Schema::table('academic_periods', function(Blueprint $table){
         $table->dropForeign('academic_periods_facultad_id_foreign');
      });
      Schema::drop('academic_periods');
   }
}

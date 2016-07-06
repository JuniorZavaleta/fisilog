<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAcademicCyclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::table('academic_cycles', function(Blueprint $table) {
         $table->dropForeign('academic_cycles_facultad_id_foreign');
      });

      Schema::drop('academic_cycles');
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      Schema::create('academic_cycles', function(Blueprint $table) {
         $table->increments('id');
         $table->integer('facultad_id')->unsigned();
         $table->string('name');
         $table->date('start_date');
         $table->date('end_date');
         $table->integer('year');
      });

      Schema::table('academic_cycles', function(Blueprint $table) {
         $table->foreign('facultad_id')
               ->references('id')
               ->on('facultades')
               ->onDelete('cascade')
               ->onUpdate('cascade');
        });
   }
}

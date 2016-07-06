<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropTableShedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
   {
      Schema::drop('schedules');
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
   public function down()
   {
      Schema::create('schedules', function(Blueprint $table) {
         $table->increments('id');
         $table->time('start_hour');
         $table->time('end_hour');
         $table->enum('day_of_the_week',['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);
      });
   }
}

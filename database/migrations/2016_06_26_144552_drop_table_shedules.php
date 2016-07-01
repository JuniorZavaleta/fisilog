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
        //
   }
}

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
        Schema::create('academic_periods', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedInteger('facultad_id');

            $table->foreign('facultad_id')->references('id')->on('facultades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academic_periods', function (Blueprint $table){
            $table->dropForeign('academic_periods_facultad_id_foreign');
        });

        Schema::drop('academic_periods');
   }
}

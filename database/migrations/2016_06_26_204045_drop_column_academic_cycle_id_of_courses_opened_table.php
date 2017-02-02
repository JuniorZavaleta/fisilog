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
        Schema::table('courses_opened', function (Blueprint $table) {
            $table->foreign('academic_period_id')->references('id')->on('academic_periods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses_opened', function (Blueprint $table) {
            $table->dropForeign('courses_opened_academic_period_id_foreign');
        });
    }
}

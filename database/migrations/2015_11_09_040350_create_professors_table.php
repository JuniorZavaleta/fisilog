<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->unsignedInteger('academic_department_id');
            $table->enum('type',['Nombrado','Contratado','Auxiliar']);

            $table->primary('id');
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('academic_department_id')->references('id')->on('academic_departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professors', function (Blueprint $table) {
            $table->dropForeign('professors_id_foreign');
            $table->dropForeign('professors_academic_department_id_foreign');
        });

        Schema::drop('professors');
    }
}

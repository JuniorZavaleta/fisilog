<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('professor_id');
            $table->string('serialNumber', 22)->unique();
            $table->string('brand', 10);
            $table->string('model', 30);
            $table->timestamps();

            $table->foreign('professor_id')->references('id')->on('professors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropForeign('devices_professor_id_foreign');
        });

        Schema::drop('devices');
    }
}

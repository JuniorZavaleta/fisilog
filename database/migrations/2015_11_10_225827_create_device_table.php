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
        Schema::create('device',function(Blueprint $table){
            $table->string('serialNumber', 22)->unique();
            $table->string('brand', 10);
            $table->string('model', 30);
            $table->integer('professor_id');
            $table->timestamps();
        });

        Schema::table('device', function(Blueprint $table){
            $table  ->foreign('professor_id')
                    ->references('id')
                    ->on('professors')
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
        Schema::table('device', function(Blueprint $table){
            $table->dropForeign('device_professor_id_foreign');
        });
        Schema::drop('device');
    }
}

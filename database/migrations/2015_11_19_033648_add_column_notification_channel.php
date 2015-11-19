<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNotificationChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->integer('notification_channel_id')->unsigned()->nullable();
        });
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('notification_channel_id')
                  ->references('id')
                  ->on('notification_channels')
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
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('users_notification_channel_id_foreign');
        });
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('notification_channel_id');
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsClassTable extends Migration
{

   public function up()
   {
      Schema::create('sessions_class', function(Blueprint $table) {
         $table->increments('id');
         $table->integer('class_id')->unsigned();
         $table->date('session_date');
         $table->char('status');
      });

      Schema::table('sessions_class', function(Blueprint $table) {
         $table->foreign('class_id')
               ->references('id')
               ->on('classes')
               ->onUpdate('cascade')
               ->onDelete('cascade');
      });
   }

   public function down()
   {
      Schema::table('sessions_class', function(Blueprint $table) {
         $table->dropForeign('sessions_class_class_id_foreign');
      });

      Schema::drop('sessions_class');
   }

}

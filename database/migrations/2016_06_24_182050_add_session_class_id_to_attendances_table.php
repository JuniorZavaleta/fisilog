<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSessionClassIdToAttendancesTable extends Migration
{
   public function up()
   {
      Schema::table('attendances', function(Blueprint $table) {
         $table->integer('session_class_id')->unsigned();
      });

      Schema::table('attendances', function(Blueprint $table) {
         $table->foreign('session_class_id')
               ->references('id')
               ->on('sessions_class')
               ->onUpdate('cascade')
               ->onDelete('cascade');
      });
   }

   public function down()
   {
      Schema::table('attendances', function(Blueprint $table) {
         $table->dropForeign('attendances_session_class_id_foreign');
      });

      Schema::table('attendances', function(Blueprint $table) {
         $table->dropColumn('session_class_id');
      });
   }
}

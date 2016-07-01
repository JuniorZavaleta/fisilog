<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsAttendancesTable extends Migration
{
   public function up()
   {
      Schema::table('attendances', function(Blueprint $table) {
         $table->dropForeign('attendances_class_id_foreign');
      });

      Schema::table('attendances', function(Blueprint $table) {
         $table->dropColumn('date');
         $table->dropColumn('class_id');
      });
   }

   public function down()
   {
      Schema::table('attendances', function(Blueprint $table) {
         $table->date('date');
         $table->integer('class_id')->unsigned();
      });

      Schema::table('attendances', function(Blueprint $table) {
         $table->foreign('class_id')
               ->references('id')
               ->on('classes')
               ->onUpdate('cascade')
               ->onDelete('cascade');
      });
   }
}

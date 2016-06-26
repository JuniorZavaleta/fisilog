<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToClassesTable extends Migration
{
   /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
      Schema::table('classes', function(Blueprint $table) {
         $table->dropForeign('classes_schedule_id_foreign');
      });

      Schema::table('classes', function(Blueprint $table) {
         $table->dropColumn('schedule_id');
         $table->dropColumn('type');
         $table->dropColumn('status');
      });

      Schema::table('classes', function(Blueprint $table) {
         $table->time('start_hour');
         $table->time('end_hour');
         $table->char('day', 1);
         $table->char('type', 1);
      });
   }

   /**
   * Reverse the migrations.
   *
   * @return void
   */
   public function down()
   {
      Schema::table('classes', function(Blueprint $table) {
         $table->dropColumn('start_hour');
         $table->dropColumn('end_hour');
         $table->dropColumn('day');
         $table->dropColumn('type');
      });

      Schema::table('classes', function(Blueprint $table) {
         $table->integer('schedule_id')->unsigned();
         $table->enum('type',['Theory','Practice','Lab']);
         $table->enum('status',['WAITING','CANCELED','ON_COURSE']);
      });

      Schema::table('classes', function(Blueprint $table) {
         $table->foreign('schedule_id')
               ->references('id')
               ->on('schedules')
               ->onUpdate('cascade')
               ->onDelete('cascade');
     });
   }
}

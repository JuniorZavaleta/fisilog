<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{

   public function up()
   {
      Schema::create('professors', function(Blueprint $table) {
         $table->integer('id')->unsigned();
         $table->integer('academic_department_id')->unsigned();
         $table->enum('type',['Nombrado','Contratado','Auxiliar']);
      });

      Schema::table('professors', function(Blueprint $table) {
         $table->primary('id');

         $table->foreign('id')
               ->references('id')
               ->on('users')
               ->onUpdate('cascade')
               ->onDelete('cascade');

         $table->foreign('academic_department_id')
               ->references('id')
               ->on('academic_departments')
               ->onUpdate('cascade')
               ->onDelete('cascade');
      });
   }

   public function down()
   {
      Schema::table('professors', function(Blueprint $table) {
         $table->dropForeign('professors_id_foreign');
         $table->dropForeign('professors_academic_department_id_foreign');
      });

      Schema::drop('professors');
   }
}

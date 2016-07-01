<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTypeFkToUsersTable extends Migration
{
   public function up()
   {
      Schema::table('users', function($table) {
         $table->integer('user_type_id')->unsigned()->nullable();
      });

      Schema::table('users', function($table) {
         $table->foreign('user_type_id')
               ->on('user_types')
               ->references('id')
               ->onDelete('cascade')
               ->onUpdate('set null');
      });
   }

   public function down()
   {
      Schema::table('users', function($table) {
         $table->dropForeign('users_user_type_id_foreign');
      });

      Schema::table('users', function($table) {
         $table->dropColumn('user_type_id');
      });
   }
}

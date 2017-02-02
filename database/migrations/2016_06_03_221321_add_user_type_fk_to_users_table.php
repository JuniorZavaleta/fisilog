<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTypeFkToUsersTable extends Migration
{
   public function up()
   {
      Schema::table('users', function($table) {
         $table->foreign('user_type_id')
               ->on('user_types')
               ->references('id')
               ->onDelete('cascade')
               ->onUpdate('cascade');
      });
   }

   public function down()
   {
      Schema::table('users', function($table) {
         $table->dropForeign('users_user_type_id_foreign');
      });
   }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnTypeOnUsersTable extends Migration
{
   public function up()
   {
      Schema::table('users', function($table) {
         $table->dropColumn('type');
      });
   }

   public function down()
   {
      Schema::table('users', function($table) {
         $table->string('type');
      });
   }
}

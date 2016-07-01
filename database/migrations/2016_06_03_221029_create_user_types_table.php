<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration
{
   public function up()
   {
      Schema::create('user_types', function(Blueprint $table) {
         $table->increments('id');
         $table->string('name');
      });
   }

   public function down()
   {
      Schema::drop('user_types');
   }
}

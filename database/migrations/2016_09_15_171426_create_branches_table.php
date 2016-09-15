<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')->unsigned();
            $table->string('name');
            $table->string('address');
        });

        Schema::table('branches', function(Blueprint $table) {
            $table->foreign('institution_id')
                  ->references('id')
                  ->on('institutions')
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
        Schema::table('branches', function(Blueprint $table) {
            $table->dropForeign('branches_institution_id_foreign');
        });

        Schema::drop('branches');
    }
}

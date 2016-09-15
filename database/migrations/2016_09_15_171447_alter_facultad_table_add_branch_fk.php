<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFacultadTableAddBranchFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facultades', function(Blueprint $table) {
            $table->integer('branch_id')->unsigned();
        });

        Schema::table('facultades', function(Blueprint $table) {
            $table->foreign('branch_id')
                  ->references('id')
                  ->on('branches')
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
        Schema::table('facultades', function(Blueprint $table) {
            $table->dropForeign('facultades_branch_id_foreign');
        });

        Schema::table('facultades', function(Blueprint $table) {
            $table->dropColumn('branch_id');
        });
    }
}

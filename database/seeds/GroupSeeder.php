<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
        	['id'=>1, 'number_of_group'=>1, 'course_opened_id'=>1],
        	['id'=>2, 'number_of_group'=>2, 'course_opened_id'=>1],
        ]);
    }
}

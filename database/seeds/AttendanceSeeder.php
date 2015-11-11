<?php

use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert([
        	['id'=>1, 'user_id'=>1, 'class_id'=>1, 'date'=>date('Y-m-d')],
        	['id'=>2, 'user_id'=>1, 'class_id'=>2, 'date'=>date('Y-m-d')],
        ]);
    }
}

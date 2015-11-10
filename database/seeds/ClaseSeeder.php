<?php

use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
        	['id'=>1, 'classroom_id'=>1, 'professor_id'=>1, 'schedule_id'=>1, 'group_id'=>1, 'type' => 'Lab', 'status'=> 'WAITING'],
        ]);
    }
}

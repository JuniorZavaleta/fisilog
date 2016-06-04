<?php

use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
   public function run()
   {
      DB::table('classes')->truncate();
      DB::table('classes')->insert([
         ['id'=>1, 'classroom_id'=>1, 'professor_id'=>1, 'schedule_id'=>1, 'group_id'=>1, 'type' => 'Lab', 'status'=> 'WAITING'],
         ['id'=>2, 'classroom_id'=>1, 'professor_id'=>1, 'schedule_id'=>2, 'group_id'=>1, 'type' => 'Lab', 'status'=> 'WAITING'],
      ]);
   }
}

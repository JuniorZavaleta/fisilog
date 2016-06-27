<?php

use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
   public function run()
   {
      DB::table('classes')->truncate();
      DB::table('classes')->insert([
         [
            'id' => 1,
            'classroom_id' => 1,
            'professor_id' => 2,
            'group_id' => 1,
            'start_hour' => date('H:i:s', strtotime('13:00:00')),
            'end_hour'=> date('H:i:s', strtotime('16:00:00')),
            'day' => 'J',
            'type'=>'T'
         ],
         [
            'id' => 2,
            'classroom_id' => 1,
            'professor_id' => 1,
            'group_id' => 1,
            'start_hour' => date('H:i:s', strtotime('16:00:00')),
            'end_hour' => date('H:i:s', strtotime('18:00:00')),
            'day' => 'J',
            'type' => 'L'
         ],
      ]);
   }
}

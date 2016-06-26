<?php

use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
   public function run()
   {
      DB::table('classes')->truncate();
      DB::table('classes')->insert([
         ['id' => 1, 'classroom_id' => 1, 'professor_id' => 2, 'group_id' => 1],
         ['id' => 2, 'classroom_id' => 1, 'professor_id' => 2, 'group_id' => 1],
      ]);
   }
}

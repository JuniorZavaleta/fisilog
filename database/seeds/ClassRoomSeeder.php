<?php

use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
   public function run()
   {
      DB::table('classrooms')->truncate();
      DB::table('classrooms')->insert([
         ['id' => 1, 'facultad_id' => 20, 'name' => '101'],
         ['id' => 2, 'facultad_id' => 20, 'name' => '102'],
         ['id' => 3, 'facultad_id' => 20, 'name' => '103'],
         ['id' => 4, 'facultad_id' => 20, 'name' => '104'],
         ['id' => 5, 'facultad_id' => 20, 'name' => '105'],
         ['id' => 6, 'facultad_id' => 20, 'name' => '105-A'],
         ['id' => 7, 'facultad_id' => 20, 'name' => '106'],
         ['id' => 8, 'facultad_id' => 20, 'name' => '107'],
         ['id' => 9, 'facultad_id' => 20, 'name' => '108'],
         ['id' => 10, 'facultad_id' => 20, 'name' => '201'],
         ['id' => 11, 'facultad_id' => 20, 'name' => '202'],
         ['id' => 12, 'facultad_id' => 20, 'name' => '203'],
         ['id' => 13, 'facultad_id' => 20, 'name' => '204'],
         ['id' => 14, 'facultad_id' => 20, 'name' => '205'],
         ['id' => 15, 'facultad_id' => 20, 'name' => 'FAM-1'],
      ]);
   }
}

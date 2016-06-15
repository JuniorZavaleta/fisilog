<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
   public function run()
   {
      DB::table('groups')->truncate();
      DB::table('groups')->insert([
         ['id'=>1, 'number_of_group'=>1, 'course_opened_id'=>1],
         ['id'=>2, 'number_of_group'=>2, 'course_opened_id'=>1],
      ]);
   }
}

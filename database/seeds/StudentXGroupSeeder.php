<?php

use Illuminate\Database\Seeder;

class StudentXGroupSeeder extends Seeder
{
   public function run()
   {
      DB::table('students_x_groups')->truncate();
      DB::table('students_x_groups')->insert([
         ['id'=>1, 'student_id'=> 1, 'group_id'=>1],
      ]);
   }
}

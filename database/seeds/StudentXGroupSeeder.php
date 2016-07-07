<?php

use Illuminate\Database\Seeder;

class StudentXGroupSeeder extends Seeder
{
   public function run()
   {
      DB::table('students_x_groups')->truncate();
      DB::table('students_x_groups')->insert([
         ['id'=>1, 'student_id'=> 1, 'group_id'=>1],
         ['id'=>2, 'student_id'=> 3, 'group_id'=>1],
         ['id'=>3, 'student_id'=> 5, 'group_id'=>1],
         ['id'=>4, 'student_id'=> 7, 'group_id'=>1],
         ['id'=>5, 'student_id'=> 8, 'group_id'=>1],
         ['id'=>6, 'student_id'=> 9, 'group_id'=>1],
         ['id'=>7, 'student_id'=> 10, 'group_id'=>1],
      ]);
   }
}

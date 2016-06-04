<?php

use Illuminate\Database\Seeder;

class CourseOpenedSeeder extends Seeder
{
   public function run()
   {
      DB::table('courses_opened')->truncate();
      DB::table('courses_opened')->insert([
         ['id'=>1, 'course_id'=>1, 'professor_id'=>1, 'academic_cycle_id'=>1],
      ]);
   }
}

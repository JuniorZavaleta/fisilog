<?php

use Illuminate\Database\Seeder;

class CourseOpenedSeeder extends Seeder
{
   public function run()
   {
      DB::table('courses_opened')->truncate();
      DB::table('courses_opened')->insert([
         ['id'=>1, 'course_id'=>1, 'professor_id'=>1, 'academic_period_id'=>1],
         ['id'=>2, 'course_id'=>1, 'professor_id'=>1, 'academic_period_id'=>7],
         ['id'=>3, 'course_id'=>1, 'professor_id'=>1, 'academic_period_id'=>8],
      ]);
   }
}

<?php

use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('course_types')->truncate();
      DB::table('course_types')->insert([
         ['id' => 1, 'name' => 'Obligatorio'],
         ['id' => 2, 'name' => 'Electivo'],
      ]);
   }
}

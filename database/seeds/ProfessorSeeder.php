<?php

use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
   public function run()
   {
      DB::table('professors')->truncate();
      DB::table('professors')->insert([
         ['id'=>1, 'academic_department_id'=>1, 'type'=>'Nombrado'],
      ]);
   }
}

<?php

use Illuminate\Database\Seeder;

class AcademicPlanSeeder extends Seeder
{
   public function run()
   {
      DB::table('academic_plans')->truncate();
      DB::table('academic_plans')->insert([
         ['id'=>1,'school_id'=>61,'name'=>'Plan de estudios 2012','year_of_publication'=>2012,'is_active'=>true],
      ]);
   }
}

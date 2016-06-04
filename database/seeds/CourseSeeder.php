<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
   public function run()
   {
      DB::table('courses')->truncate();
      DB::table('courses')->insert([
         ['id'=>1, 'name'=>'Diseño de Software', 'code'=>'DSW', 'quantity_of_credits'=>4, 'academic_plan_id'=> 1],
         ['id'=>2, 'name'=>'Arquitectura de Software', 'code'=>'ASW', 'quantity_of_credits'=>4, 'academic_plan_id'=> 1],
         ['id'=>3, 'name'=>'Calidad de Software', 'code'=>'QSW', 'quantity_of_credits'=>4, 'academic_plan_id'=> 1],
         ['id'=>4, 'name'=>'Prueba de Software', 'code'=>'TSW', 'quantity_of_credits'=>4, 'academic_plan_id'=> 1],
         ['id'=>5, 'name'=>'Sistemas Operativos', 'code'=>'SO', 'quantity_of_credits'=>4, 'academic_plan_id'=> 1],
      ]);
   }
}

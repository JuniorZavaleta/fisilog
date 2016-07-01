<?php

use Illuminate\Database\Seeder;

class AcademicDepartmentSeeder extends Seeder
{
   public function run()
   {
      DB::table('academic_departments')->truncate();
      DB::table('academic_departments')->insert([
         ['id'=>1, 'name'=>'Departamento de Ingeniería de Software'],
         ['id'=>2, 'name'=>'Departamento de Ciencias de la Computación'],
      ]);
   }
}

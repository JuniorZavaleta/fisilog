<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
   public function run()
   {
      DB::table('user_types')->truncate();
      DB::table('user_types')->insert([
         ['id' => '1', 'name' => 'Estudiante'],
         ['id' => '2', 'name' => 'Docente'],
         ['id' => '3', 'name' => 'Encargado Atencion al Docente'],
         ['id' => '4', 'name' => 'Decano'],
      ]);
   }
}

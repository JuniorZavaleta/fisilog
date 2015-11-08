<?php

use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
   public function run()
   {
      DB::table('document_types')->insert([
         ['id' => 1, 'name' => 'DNI'],
         ['id' => 2, 'name' => 'Carné Universitario'],
         ['id' => 3, 'name' => 'Carné de Biblioteca'],
      ]);
   }
}

<?php

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
   public function run()
   {
      DB::table('documents')->insert([
         ['id'=>1, 'user_id'=>1, 'document_type_id'=>1 , 'code' => '76726604' ],
         ['id'=>2, 'user_id'=>1, 'document_type_id'=>2 , 'code' => '12200187' ],
      ]);
   }
}

<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
   public function run()
   {
      DB::table('students')->truncate();
      DB::table('students')->insert([
         ['id'=>1, 'school_id'=>61, 'code'=>'12200187', 'year_of_entry'=>2012],
      ]);
   }
}

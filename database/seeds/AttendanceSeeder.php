<?php

use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
   public function run()
   {
      DB::table('attendances')->truncate();
      DB::table('attendances')->insert([
         ['id' => 1, 'user_id' => 1, 'verified' => 1, 'session_class_id' => 1],
         ['id' => 2, 'user_id' => 1, 'verified' => 0, 'session_class_id' => 2],
         ['id' => 3, 'user_id' => 1, 'verified' => 1, 'session_class_id' => 3],
         ['id' => 4, 'user_id' => 1, 'verified' => 0, 'session_class_id' => 4],
         ['id' => 5, 'user_id' => 1, 'verified' => 1, 'session_class_id' => 5],
         ['id' => 6, 'user_id' => 1, 'verified' => 0, 'session_class_id' => 6],
         ['id' => 7, 'user_id' => 1, 'verified' => 1, 'session_class_id' => 7],
         ['id' => 8, 'user_id' => 1, 'verified' => 0, 'session_class_id' => 8],

         ['id' => 9, 'user_id' => 5, 'verified' => 1, 'session_class_id' => 1],
         ['id' => 10, 'user_id' => 5, 'verified' => 0, 'session_class_id' => 2],
         ['id' => 11, 'user_id' => 5, 'verified' => 1, 'session_class_id' => 3],
         ['id' => 12, 'user_id' => 5, 'verified' => 0, 'session_class_id' => 4],
         ['id' => 13, 'user_id' => 5, 'verified' => 1, 'session_class_id' => 5],
         ['id' => 14, 'user_id' => 5, 'verified' => 0, 'session_class_id' => 6],
         ['id' => 15, 'user_id' => 5, 'verified' => 1, 'session_class_id' => 7],
         ['id' => 16, 'user_id' => 5, 'verified' => 0, 'session_class_id' => 8],
      ]);
   }
}

<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
   public function run()
   {
      DB::table('users')->insert([
         [
            'id' => 1, 
            'name' => 'junior', 
            'lastname' => 'claudio',
            'email' => 'juniorclaudiozavaleta@gmail.com',
            'phone' => '76726604',
            'password' => Hash::make('123456'),
         ]
      ]);
   }
}

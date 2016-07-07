<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
   public function run()
   {
      DB::table('users')->truncate();
      DB::table('users')->insert([
         [
            'id' => 1,
            'name' => 'junior',
            'lastname' => 'claudio',
            'email' => 'juniorclaudiozavaleta@gmail.com',
            'phone' => '76726604',
            'password' => Hash::make('123456'),
            'notification_channel_id' => 3,
            'user_type_id' => 1,
            'photo_url' => '/',
            'notification_receipt' => '',
         ],
         [
            'id' => 2,
            'name' => 'prueba profesor',
            'lastname' => 'prueba profesor',
            'email' => 'test@email.com',
            'phone' => '12345678',
            'password' => Hash::make('123456'),
            'notification_channel_id' => 2,
            'user_type_id' => 2,
            'photo_url' => '/',
            'notification_receipt' => '',
         ],
         [
            'id' => 3,
            'name' => 'takeshi',
            'lastname' => 'farro',
            'email' => 'takeshi_farro@gmail.com',
            'phone' => '76726605',
            'password' => Hash::make('123456'),
            'notification_channel_id' => 1,
            'user_type_id' => 1,
            'photo_url' => '/',
            'notification_receipt' => '',
         ],
         [
            'id' => 4,
            'name' => 'nombre prof 2',
            'lastname' => 'apellido',
            'email' => 'test2@email.com',
            'phone' => '12345678',
            'password' => Hash::make('123456'),
            'notification_channel_id' => 2,
            'user_type_id' => 2,
            'photo_url' => '/',
            'notification_receipt' => '',
         ],
         [
            'id' => 5,
            'name' => 'junior',
            'lastname' => 'zavaleta',
            'email' => '12200187@unmsm.edu.pe',
            'phone' => '123456789',
            'password' => Hash::make('123456'),
            'notification_channel_id' => 2,
            'user_type_id' => 1,
            'photo_url' => '/',
            'notification_receipt' => '12200187@unmsm.edu.pe',
         ],
      ]);
   }
}

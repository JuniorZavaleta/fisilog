<?php

use Illuminate\Database\Seeder;

class NotificationChannelSeeder extends Seeder
{
   public function run()
   {
      DB::table('notification_channels')->truncate();
      DB::table('notification_channels')->insert([
         ['id' => 1, 'name' => 'sms'],
         ['id' => 2, 'name' => 'email'],
         ['id' => 3, 'name' => 'telegram'],
      ]);
   }
}

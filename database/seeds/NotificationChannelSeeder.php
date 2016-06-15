<?php

use Illuminate\Database\Seeder;

class NotificationChannelSeeder extends Seeder
{
   public function run()
   {
      DB::table('notification_channels')->truncate();
      DB::table('notification_channels')->insert([
         ['id'=>1, 'name'=>'SMS'],
         ['id'=>2, 'name'=>'Email'],
      ]);
   }
}

<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
   public function run()
   {
      DB::table('devices')->truncate();
      DB::table('devices')->insert([
         ['serialNumber'=>'A456', 'brand'=> 'LG', 'model'=> 'L100', 'professor_id'=>1] ,
         ['serialNumber'=>'A918', 'brand'=> 'Motorola', 'model'=> 'GX9', 'professor_id'=>1],
      ]);
   }
}

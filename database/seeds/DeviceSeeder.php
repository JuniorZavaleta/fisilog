<?php

use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('device')->insert([
        	['serialNumber'=>'A456', 'brand'=> 'LG', 'model'=> 'L100', 'professor_id'=>1] ,
        	['serialNumber'=>'A918', 'brand'=> 'Motorola', 'model'=> 'GX9', 'professor_id'=>1],
        	['serialNumber'=>'C879', 'brand'=> 'Huawei', 'model'=> 'T700', 'professor_id'=>2] ,

        	]);
    }
}

<?php

use Illuminate\Database\Seeder;

class AcademicCycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_cycles')->insert([
        	['id'=>1,'facultad_id'=>20,'name'=>'2015-II','year'=>'2015','start_date'=>date('Y-m-d',strtotime('05/06/2015')),'end_date'=>date('Y-m-d',strtotime('01/12/2015'))],
        ]);
    }
}

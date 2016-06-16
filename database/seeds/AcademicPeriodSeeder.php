<?php

use Illuminate\Database\Seeder;

class AcademicPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
   {
      DB::table('academic_periods')->truncate();
      DB::table('academic_periods')->insert([
         ['id'=>1, 'name'=>'2015-I', 'start_date'=>date('Y-m-d'), 'end_date'=>date('Y-m-d'), 'facultad_id'=>20],
         ['id'=>2, 'name'=>'2015-II', 'start_date'=>date('Y-m-d'), 'end_date'=>date('Y-m-d'), 'facultad_id'=>20],
         ['id'=>3, 'name'=>'2016-I', 'start_date'=>date('Y-m-d'), 'end_date'=>date('Y-m-d'), 'facultad_id'=>20],
         ['id'=>4, 'name'=>'2016-II', 'start_date'=>date('Y-m-d'), 'end_date'=>date('Y-m-d'), 'facultad_id'=>20],
         ['id'=>5, 'name'=>'2015-I', 'start_date'=>date('Y-m-d'), 'end_date'=>date('Y-m-d'), 'facultad_id'=>1],
         ['id'=>6, 'name'=>'2015-II', 'start_date'=>date('Y-m-d'), 'end_date'=>date('Y-m-d'), 'facultad_id'=>1],
         ['id'=>7, 'name'=>'2016-I', 'start_date'=>date('Y-m-d'), 'end_date'=>date('Y-m-d'), 'facultad_id'=>1],
         ['id'=>8, 'name'=>'2016-II', 'start_date'=>date('Y-m-d'), 'end_date'=>date('Y-m-d'), 'facultad_id'=>1],
      ]);
   }
}

<?php

use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
        	['id'=>1, 'start_hour'=>date('H:i:s',strtotime('08:00')), 'end_hour'=>date('H:i:s',strtotime('12:00')), 'day_of_the_week'=>'Monday'],
        	['id'=>2, 'start_hour'=>date('H:i:s',strtotime('08:00')), 'end_hour'=>date('H:i:s',strtotime('12:00')), 'day_of_the_week'=>'Tuesday'],
        	['id'=>3, 'start_hour'=>date('H:i:s',strtotime('08:00')), 'end_hour'=>date('H:i:s',strtotime('12:00')), 'day_of_the_week'=>'Wednesday'],
        	['id'=>4, 'start_hour'=>date('H:i:s',strtotime('08:00')), 'end_hour'=>date('H:i:s',strtotime('12:00')), 'day_of_the_week'=>'Thursday'],
        	['id'=>5, 'start_hour'=>date('H:i:s',strtotime('08:00')), 'end_hour'=>date('H:i:s',strtotime('12:00')), 'day_of_the_week'=>'Friday'],
        ]);
    }
}

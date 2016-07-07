<?php

use Illuminate\Database\Seeder;

class SessionClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
   {
      DB::table('sessions_class')->truncate();
      DB::table('sessions_class')->insert([
         ['id'=>1, 'class_id'=>1, 'session_date'=>date('Y-m-d',strtotime('06/05/2016')), 'status'=>'I'],
         ['id'=>2, 'class_id'=>1, 'session_date'=>date('Y-m-d',strtotime('06/12/2016')), 'status'=>'C'],
         ['id'=>3, 'class_id'=>1, 'session_date'=>date('Y-m-d',strtotime('06/19/2016')), 'status'=>'I'],
         ['id'=>4, 'class_id'=>1, 'session_date'=>date('Y-m-d',strtotime('06/26/2016')), 'status'=>'I'],
         ['id'=>5, 'class_id'=>2, 'session_date'=>date('Y-m-d',strtotime('06/05/2016')), 'status'=>'I'],
         ['id'=>6, 'class_id'=>2, 'session_date'=>date('Y-m-d',strtotime('06/12/2016')), 'status'=>'C'],
         ['id'=>7, 'class_id'=>2, 'session_date'=>date('Y-m-d',strtotime('06/19/2016')), 'status'=>'I'],
         ['id'=>8, 'class_id'=>2, 'session_date'=>date('Y-m-d',strtotime('06/26/2016')), 'status'=>'I'],
         ['id'=>9, 'class_id'=>1, 'session_date'=>date('Y-m-d',strtotime('07/07/2016')), 'status'=>'I'],
         ['id'=>10, 'class_id'=>2, 'session_date'=>date('Y-m-d',strtotime('07/07/2016')), 'status'=>'I'],
         ['id'=>11, 'class_id'=>5, 'session_date'=>date('Y-m-d',strtotime('07/07/2016')), 'status'=>'I'],
         ['id'=>12, 'class_id'=>6, 'session_date'=>date('Y-m-d',strtotime('07/07/2016')), 'status'=>'I'],
      ]);
   }
}

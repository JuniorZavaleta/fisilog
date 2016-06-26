<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   public function run()
   {
      Eloquent::unguard();

      //disable foreign key check for this connection before running seeders
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');

      $this->call(DocumentTypeSeeder::class);
      $this->call(NotificationChannelSeeder::class);
      $this->call(UserTypeSeeder::class);
      $this->call(UserSeeder::class);
      $this->call(DocumentSeeder::class);
      $this->call(FacultadSeeder::class);
      $this->call(SchoolSeeder::class);
      $this->call(ScheduleSeeder::class);
      $this->call(ClassRoomSeeder::class);
      $this->call(StudentSeeder::class);
      $this->call(AcademicDepartmentSeeder::class);
      $this->call(ProfessorSeeder::class);
      $this->call(AcademicPlanSeeder::class);
      $this->call(AcademicCycleSeeder::class);
      $this->call(CourseTypeSeeder::class);
      $this->call(CourseSeeder::class);
      $this->call(CourseOpenedSeeder::class);
      $this->call(GroupSeeder::class);
      $this->call(ClaseSeeder::class);
      $this->call(AttendanceSeeder::class);
      $this->call(DeviceSeeder::class);
      $this->call(StudentXGroupSeeder::class);
      $this->call(AcademicPeriodSeeder::class);

      DB::statement('SET FOREIGN_KEY_CHECKS=1;');

      Eloquent::reguard();
   }
}

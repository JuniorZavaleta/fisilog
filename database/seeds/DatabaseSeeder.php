<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(DocumentTypeSeeder::class);
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
        $this->call(CourseSeeder::class);
        Model::reguard();
    }
}

<?php
namespace FisiLog\DAO\Clase;

use FisiLog\BusinessClasses\Clase as ClaseBusiness;
use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
use FisiLog\BusinessClasses\ClassRoom as ClassRoomBusiness;
use FisiLog\BusinessClasses\Schedule as ScheduleBusiness;
use FisiLog\BusinessClasses\Group as GroupBusiness;
use FisiLog\BusinessClasses\CourseOpened as CourseOpenedBusiness;
use FisiLog\BusinessClasses\Course as CourseBusiness;
use FisiLog\Models\Clase as ClaseModel;

class ClaseDaoEloquent implements ClaseDao {

   private function createClassRoom($clase)
   {
      $classroom = new ClassRoomBusiness;
      $classroom->setId($clase->classroom->id);
      $classroom->setName($clase->classroom->name);

      return $classroom;
   }

   private function createSchedule($clase)
   {
      $schedule = new ScheduleBusiness;
      $schedule->setStartHour($clase->schedule->start_hour);
      $schedule->setEndHour($clase->schedule->end_hour);
      $schedule->setDayOfTheWeek($clase->schedule->day_of_the_week);

      return $schedule;
   }

   private function createGroup($clase)
   {
      $groupModel = $clase->group;
      $group = new GroupBusiness;
      $group->setId($groupModel->id);
      $group->setNumberOfGroup($groupModel->number_of_group);

      $courseOpenedModel = $groupModel->courseOpened;
      $courseModel = $courseOpenedModel->course;

      $course = new CourseBusiness;
      $course->setId($courseModel->id);
      $course->setName($courseModel->name);
      $course->setCode($courseModel->code);
      $course->setQuantityOfCredits($courseModel->quantity_of_credits);

      $courseOpened = new CourseOpenedBusiness;
      $courseOpened->setCourse($course);
      $group->setCourseOpened($courseOpened);

      return $group;
   }

   private function createProfessor($clase)
   {
      $professorModel = $clase->professor;
      $professorBusiness = new ProfessorBusiness;
      $professorBusiness->setId($professorModel->id);
      $professorBusiness->setProfessorType($professorModel->type);

      return $professorBusiness;
   }

   public function getByProfessor($professor_id)
   {
      $clases_model = ClaseModel::where('professor_id', '=', $professor_id)->get();
      $clases_business = [];

      foreach ($clases_model as $clase_model)
         $clases_business[] = static::createBusinessClass($clase_model);

      return $clases_business;
   }

   public function findById($id)
   {
      $clase_model = ClaseModel::find($id);

      return static::createBusinessClass($clase_model);
   }

   public static function createBusinessClass(ClaseModel $clase_model)
   {
      if ($clase_model == null)
         return null;

      $classroom = $this->createClassRoom($clase_model);
      $schedule = $this->createSchedule($clase_model);
      $group = $this->createGroup($clase_model);
      $professor = $this->createProfessor($clase_model);

      $clase_business = new ClaseBusiness;
      $clase_business->setId($clase_model->id);
      $clase_business->setClassRoom($classroom);
      $clase_business->setSchedule($schedule);
      $clase_business->setGroup($group);
      $clase_business->setProfessor($professor);

      return $clase_business;
   }
}
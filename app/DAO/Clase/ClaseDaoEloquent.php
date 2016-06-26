<?php
namespace FisiLog\DAO\Clase;

use FisiLog\BusinessClasses\Clase as ClaseBusiness;
use FisiLog\Models\Clase as ClaseModel;
use FisiLog\Models\CourseOpened as CourseOpenedModel;
use FisiLog\Models\Student as StudentModel;

use FisiLog\DAO\ClassRoom\ClassRoomDaoEloquent as ClassRoomModel;
use FisiLog\DAO\Professor\ProfessorDaoEloquent as ProfessorModel;
use FisiLog\DAO\Group\GroupDaoEloquent as GroupModel;

class ClaseDaoEloquent implements ClaseDao {

   public function getByProfessorId($professor_id)
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

   public function getByCourseId($course_id, $academic_cycle_id)
   {
      $courses_model = CourseOpenedModel::where('course_id', '=', $course_id)
                                       ->where('academic_cycle_id', '=', $academic_cycle_id)
                                       ->first();

      $clases_business = [];

      if ($courses_model) {
         $clases_model = $courses_model->classes;

         foreach ($clases_model as $clase_model)
            $clases_business[] = static::createBusinessClass($clase_model);
      }

      return $clases_business;
   }

   public function getByStudentId($student_id)
   {
      $groups_model = StudentModel::find($student_id)->groups;

      $clases_business = [];

      foreach ($groups_model as $group_model)
         foreach ($group_model->classes as $clase_model)
            $clases_business[] = static::createBusinessClass($clase_model);

      return $clases_business;
   }

   public static function createBusinessClass(ClaseModel $clase_model)
   {
      if ($clase_model == null)
         return null;

      $clase_business = new ClaseBusiness(
         ClassRoomModel::createBusinessClass($clase_model->classroom),
         ProfessorModel::createBusinessClass($clase_model->professor),
         GroupModel::createBusinessClass($clase_model->group),
         $clase_model->start_hour,
         $clase_model->end_hour,
         $clase_model->day,
         $clase_model->type,
         $clase_model->id
      );

      return $clase_business;
   }
}
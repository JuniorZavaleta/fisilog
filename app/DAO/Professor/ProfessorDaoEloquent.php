<?php
namespace FisiLog\DAO\Professor;

use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
use FisiLog\Models\Professor as ProfessorModel;

class ProfessorDaoEloquent implements ProfessorDao {

   public function save(ProfessorBusiness $professor_business)
   {
      ProfessorModel::create($professor_business);
   }

   public function findById($id)
   {
      $professor_model = ProfessorModel::where('id','=',$id)
      ->with('user', 'user.user_type', 'user.notification_channel', 'school')
      ->first();

      return static::createBusinessClass($professor_model);
   }

   public static function createBusinessClass(ProfessorModel $professor_model)
   {
      if ($professor_model == null)
         return null;

      $professor = new ProfessorBusiness(
         $professor_model->academic_department_id,
         $professor_model->type,
         $professor_model->id,
      );

      return $professor;
   }

}
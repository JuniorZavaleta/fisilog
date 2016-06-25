<?php
namespace FisiLog\DAO\Professor;

use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
use FisiLog\Models\Professor as ProfessorModel;

use FisiLog\DAO\User\UserDaoEloquent as UserModel;
use FisiLog\DAO\AcademicDepartment\AcademicDepartmentDaoEloquent as AcademicDepartmentModel;

class ProfessorDaoEloquent implements ProfessorDao {

   public function save(ProfessorBusiness $professor_business)
   {
      ProfessorModel::create($professor_business->toArray());
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
         UserModel::createBusinessClass($professor_model->user),
         AcademicDepartmentModel::createBusinessClass($professor_model->academic_department),
         $professor_model->type,
         $professor_model->id
      );

      return $professor;
   }

}
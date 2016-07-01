<?php
namespace FisiLog\DAO\AcademicDepartment;

use FisiLog\BusinessClasses\AcademicDepartment as AcademicDepartmentBusiness;
use FisiLog\Models\AcademicDepartment as AcademicDepartmentModel;

class AcademicDepartmentDaoEloquent implements AcademicDepartmentDao {

   public function findById($id)
   {
      $academic_department_model = AcademicDepartmentModel::find($id);

      return static::createBusinessClass($academic_department_model);
   }

   public function getAll()
   {
      $academic_departments_model = AcademicDepartmentModel::all();
      $academic_departments_business = [];

      foreach ($academic_departments_model as $academic_department_model)
         $academic_departments_business[] = static::createBusinessClass($academic_department_model);

      return $academic_departments_business;
  }

   public static function createBusinessClass(AcademicDepartmentModel $academic_department_model)
   {
      if ($academic_department_model == null)
         return null;

      $academic_department_business = new AcademicDepartmentBusiness(
         $academic_department_model->id,
         $academic_department_model->name
      );

      return $academic_department_business;
   }

}
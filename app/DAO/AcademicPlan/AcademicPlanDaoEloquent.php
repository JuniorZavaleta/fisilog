<?php
namespace FisiLog\DAO\AcademicPlan;

use FisiLog\BusinessClasses\AcademicPlan as AcademicPlanBusiness;
use FisiLog\Models\AcademicPlan as AcademicPlanModel;

use FisiLog\DAO\School\SchoolDaoEloquent as SchoolModel;

class AcademicPlanDaoEloquent implements AcademicPlanDao {

   public function findById($id)
   {
      $academic_plan_model = AcademicPlanModel::find($id);

      return static::createBusinessClass($academic_plan_model);
   }

   public function getAll()
   {
      $academic_plans_model = AcademicPlanModel::all();
      $academic_plans_business = [];

      foreach ($academic_plans_model as $academic_plan_model)
         $academic_plans_business[] = static::createBusinessClass($academic_plan_model);

      return $academic_plans_business;
  }

   public static function createBusinessClass(AcademicPlanModel $academic_plan_model)
   {
      if ($academic_plan_model == null)
         return null;

      $academic_plan_business = new AcademicPlanBusiness(
         $academic_plan_model->name,
         SchoolModel::createBusinessClass($academic_plan_model->school),
         $academic_plan_model->year_of_publication,
         $academic_plan_model->is_active,
         $academic_plan_model->id
      );

      return $academic_plan_business;
   }

   public function save(AcademicPlanBusiness &$academic_plan_business)
   {
      $academic_plan_model = AcademicPlanModel::create($academic_plan_business->toArray());
      $academic_plan_business->setId($academic_plan_model->id);
   }

   public function update(AcademicPlanBusiness $academic_plan_business)
   {
      $academic_plan_model = AcademicPlanModel::find($academic_plan_business->getId());
      $academic_plan_model->fill($academic_plan_business->toArray());
      $academic_plan_model->save();
   }

   public function getBySchoolId($school_id)
   {
      $academic_plans_model = AcademicPlanModel::where('school_id', '=', $school_id)->get();
      $academic_plans_business = [];

      foreach ($academic_plans_model as $academic_plan_model)
         $academic_plans_business[] = static::createBusinessClass($academic_plan_model);

      return $academic_plans_business;
   }

}
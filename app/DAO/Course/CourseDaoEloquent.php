<?php
namespace FisiLog\DAO\Course;

use FisiLog\BusinessClasses\Course as CourseBusiness;
use FisiLog\Models\Course as CourseModel;

use FisiLog\DAO\AcademicPlan\AcademicPlanDaoEloquent as AcademicPlanModel;
use FisiLog\DAO\CourseType\CourseTypeDaoEloquent as CourseTypeModel;

class CourseDaoEloquent implements CourseDao {

   public function findById($id)
   {
      $course_model = CourseModel::find($id);

      return static::createBusinessClass($course_model);
   }

   public function getAll()
   {
      $courses_model = CourseModel::all();
      $courses_business = [];

      foreach ($courses_model as $course_model)
         $courses_business[] = static::createBusinessClass($course_model);

      return $courses_business;
  }

   public static function createBusinessClass(CourseModel $course_model)
   {
      if ($course_model == null)
         return null;

      $course_business = new CourseBusiness(
         $course_model->name,
         $course_model->code,
         $course_model->quantity_of_credits,
         AcademicPlanModel::createBusinessClass($course_model->academic_plan),
         $course_model->ciclo,
         CourseTypeModel::createBusinessClass($course_model->course_type),
         $course_model->id
      );

      return $course_business;
   }

   public function save(CourseBusiness &$course_business)
   {
      $course_model = CourseModel::create($course_business->toArray());
      $course_business->setId($course_model->id);
   }

   public function update(CourseBusiness $course_business)
   {
      $course_model = CourseModel::find($course_business->getId());
      $course_model->fill($course_business->toArray());
      $course_model->save();
   }

   public function getByAcademicPlanId($academic_plan_id)
   {
      $courses_model = CourseModel::where('academic_plan_id', '=', $academic_plan_id)->get();
      $courses_business = [];

      foreach ($courses_model as $course_model)
         $courses_business[] = static::createBusinessClass($course_model);

      return $courses_business;
   }

   public function getByEapIdAndCiclo($eap_id, $ciclo)
   {
      $courses_model = CourseModel::whereHas('academic_plan', function($academic_plan) use ($eap_id) {
         $academic_plan->where('school_id', '=', $eap_id);
      })
      ->where('ciclo', '=', $ciclo)
      ->get();

      $courses_business = [];

      foreach ($courses_model as $course_model)
         $courses_business[] = static::createBusinessClass($course_model);

      return $courses_business;
   }

}
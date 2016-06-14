<?php
namespace FisiLog\DAO\Course;

use FisiLog\BusinessClasses\Course as CourseBusiness;
use FisiLog\Models\Course as CourseModel;

use FisiLog\DAO\AcademicPlan\AcademicPlanDaoEloquent as AcademicPlanModel;

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
         AcademicPlanModel::createBusinessClass($course_model->academic_plan)
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

}
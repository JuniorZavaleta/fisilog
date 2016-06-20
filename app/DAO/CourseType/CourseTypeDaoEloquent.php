<?php
namespace FisiLog\DAO\CourseType;

use FisiLog\BusinessClasses\CourseType as CourseTypeBusiness;

use FisiLog\Models\CourseType as CourseTypeModel;

class CourseTypeDaoEloquent implements CourseTypeDao {

   public function getAll()
   {
      $course_types_model = CourseTypeModel::all();
      $course_types = [];

      foreach ($course_types_model as $course_type_model) {
         $course_types[] = static::createBusinessClass($course_type_model);
      }

      unset($course_types_model);

      return $course_types;
   }

   public function save(CourseTypeBusiness $course_type)
   {
      $course_type_model = CourseTypeModel::create($course_type->toArray());

      return $course_type_model->id;
   }

   public function findById($id)
   {
      $course_type_model = CourseTypeModel::find($id);

      return static::createBusinessClass($course_type_model);
   }

   public static function createBusinessClass(CourseTypeModel $course_type_model)
   {
      if ($course_type_model == null)
         return null;

      $course_type = new CourseTypeBusiness(
         $course_type_model->id,
         $course_type_model->name
      );

      return $course_type;
   }
}
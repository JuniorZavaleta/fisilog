<?php
namespace FisiLog\DAO\Course;

use FisiLog\BusinessClasses\Course;

interface CourseDao {
   public function save(Course &$course);
   public function findById($id);
   public function getAll();
   public function update(Course $course);
   public function getByAcademicPlanId($academic_plan_id);
}
<?php
namespace FisiLog\DAO\CourseType;

use FisiLog\BusinessClasses\CourseType as CourseTypeBusiness;

interface CourseTypeDao {
   public function getAll();
   public function findById($id);
}
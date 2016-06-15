<?php
namespace FisiLog\DAO\Student;

use FisiLog\BusinessClasses\Student as StudentBusiness;

interface StudentDao {
   public function save(StudentBusiness $studentBusiness);
   public function findByUserId($user_id);
   public function getByGroupId($group_id);
}
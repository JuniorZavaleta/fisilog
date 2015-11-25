<?php
namespace FisiLog\DAO\Student;
use FisiLog\BusinessClasses\Student as StudentBusiness;
use FisiLog\BusinessClasses\User as UserBusiness;
interface StudentDao {
  public function save(StudentBusiness $studentBusiness);
  public function findByUser(UserBusiness $userBusiness);
}
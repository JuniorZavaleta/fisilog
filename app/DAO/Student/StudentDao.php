<?php
namespace FisiLog\DAO\Student;
use FisiLog\BusinessClasses\Student as StudentBusiness;
interface StudentDao {
  public function save(StudentBusiness $student);
}
<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\AcademicDepartment;
class Professor extends User {
  private $academicDepartment;
  private $professor_type;

  public function setAcademicDepartment(AcademicDepartment $academicDepartment) {
    $this->academicDepartment = $academicDepartment;
  }
  public function getAcademicDepartment(){
    return $this->academicDepartment;
  }
  public function setProfessorType($professor_type) {
    $this->professor_type = $professor_type;
  }
  public function getProfessorType() {
    return $this->professor_type;
  }
}

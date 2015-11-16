<?php
namespace FisiLog\DAO\Student;
use FisiLog\BusinessClasses\Student as StudentBusiness;
use FisiLog\Models\Student as StudentModel;

class StudentDaoEloquent implements StudentDao {
  public function save(StudentBusiness $studentBusiness) {
    $studentModel = new StudentModel;
    $studentModel->user_id = $studentBusiness->getId();
    $studentModel->school_id = $studentBusiness->getSchool()->getId();
    $studentModel->code = $studentBusiness->getCode();
    $studentModel->year_of_entry = $studentBusiness->getYearOfEntry();
    $studentModel->save();
    $studentBusiness->setId($studentModel->id);

    return $studentBusiness;
  }
}
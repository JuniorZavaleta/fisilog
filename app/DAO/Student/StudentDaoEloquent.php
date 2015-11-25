<?php
namespace FisiLog\DAO\Student;
use FisiLog\BusinessClasses\Student as StudentBusiness;
use FisiLog\BusinessClasses\User as UserBusiness;
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
  public function findByUser(UserBusiness $userBusiness) {
    $studentModel = StudentModel::where('user_id', '=', $userBusiness->getId())
                                ->first();
    if($studentModel == null)
      return null;

    $studentBusiness = new StudentBusiness;
    $studentBusiness->setId($studentModel->id);
    $studentBusiness->setYearOfEntry($studentModel->year_of_entry);
    $studentBusiness->setCode($studentModel->code);

    return $studentBusiness;
  }
}
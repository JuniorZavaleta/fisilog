<?php
namespace FisiLog\DAO\AcademicDepartment;
use FisiLog\BusinessClasses\AcademicDepartment as AcademicDepartmentBusiness;
use FisiLog\Models\AcademicDepartment as AcademicDepartmentModel;

class AcademicDepartmentDaoEloquent implements AcademicDepartmentDao {
  public function findById($id) {
    $academicDepartmentModel = AcademicDepartmentModel::find($id);
    $academicDepartmentBusiness = new AcademicDepartmentBusiness;
    $academicDepartmentBusiness->setId($id);
    $academicDepartmentBusiness->setName($academicDepartmentModel->name);

    return $academicDepartmentBusiness;
  }
}
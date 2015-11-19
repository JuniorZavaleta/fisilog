<?php
namespace FisiLog\DAO\School;
use FisiLog\BusinessClasses\School as SchoolBusiness;
use FisiLog\Models\School as SchoolModel;

class SchoolDaoEloquent implements SchoolDao {
  public function findById($id) {
    $schoolModel = SchoolModel::find($id);
    $schoolBusiness = new SchoolBusiness;
    $schoolBusiness->setId($id);
    $schoolBusiness->setName($schoolModel->name);

    return $schoolBusiness;
  }
  public function getAll() {
    $schoolBusiness = [];
    $schoolModel = SchoolModel::all();
    foreach ($schoolModel as $value) {
      $newSchoolBusiness = new SchoolBusiness;
      $newSchoolBusiness->setId($value->id);
      $newSchoolBusiness->setName($value->name);

      $schoolBusiness[] = $newSchoolBusiness;
    }
    return $schoolBusiness;
  }
}
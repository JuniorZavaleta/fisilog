<?php
namespace FisiLog\DAO\School;
use FisiLog\BusinessClasses\School as SchoolBusiness;
use FisiLog\Models\School as SchoolModel;

class SchoolDaoEloquent implements SchoolDao {
  public function findById($id) {
    $schoolModel = SchoolModel::find($id);
    $SchoolBusiness = new SchoolBusiness;
    $SchoolBusiness->setId($id);
    $SchoolBusiness->setName($schoolModel->name);

    return $SchoolBusiness;
  }
}
<?php
namespace FisiLog\DAO\School;
use FisiLog\BusinessClasses\School as SchoolBusiness;
interface SchoolDao {
  public function findById($id);
}
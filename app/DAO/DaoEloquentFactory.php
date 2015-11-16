<?php
namespace FisiLog\DAO;
use FisiLog\DAO\User\UserDaoEloquent;
use FisiLog\DAO\Document\DocumentDaoEloquent;
use FisiLog\DAO\DocumentType\DocumentTypeDaoEloquent;
use FisiLog\DAO\Student\StudentDaoEloquent;
use FisiLog\DAO\School\SchoolDaoEloquent;

class DaoEloquentFactory {
  public static function getUserDAO() {
    return new UserDaoEloquent;
  }
  public static function getDocumentDAO() {
    return new DocumentDaoEloquent;
  }
  public static function getDocumentTypeDAO() {
    return new DocumentTypeDaoEloquent;
  }
  public static function getStudentDAO() {
    return new StudentDaoEloquent;
  }
  public static function getSchoolDAO() {
    return new SchoolDaoEloquent;
  }
}
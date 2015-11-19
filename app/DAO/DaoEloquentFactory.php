<?php
namespace FisiLog\DAO;
use FisiLog\DAO\User\UserDaoEloquent;
use FisiLog\DAO\Document\DocumentDaoEloquent;
use FisiLog\DAO\DocumentType\DocumentTypeDaoEloquent;
use FisiLog\DAO\Student\StudentDaoEloquent;
use FisiLog\DAO\School\SchoolDaoEloquent;
use FisiLog\DAO\AcademicDepartment\AcademicDepartmentDaoEloquent;
use FisiLog\DAO\Professor\ProfessorDaoEloquent;
use FisiLog\DAO\Attendance\AttendanceDaoEloquent;
use FisiLog\DAO\Clase\ClaseDaoEloquent;

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
  public static function getAcademicDepartmentDAO() {
    return new AcademicDepartmentDaoEloquent;
  }
  public static function getProfessorDAO() {
    return new ProfessorDaoEloquent;
  }
  public static function getClaseDAO() {
    return new ClaseDaoEloquent;
  }
  public static function getAttendanceDAO() {
    return new AttendanceDaoEloquent;
  }
}
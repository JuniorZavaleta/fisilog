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
use FisiLog\DAO\Group\GroupDaoEloquent;
use FisiLog\DAO\NotificationChannel\NotificationChannelDaoEloquent;
use FisiLog\DAO\UserType\UserTypeDaoEloquent;
use FisiLog\DAO\Facultad\FacultadDaoEloquent;
use FisiLog\DAO\AcademicPlan\AcademicPlanDaoEloquent;
use FisiLog\DAO\ClassRoom\ClassRoomDaoEloquent;
use Fisilog\DAO\AcademicPeriod\AcademicPeriodDaoEloquent;

class DaoEloquentFactory {

   public static function getUserDAO()
   {
      return new UserDaoEloquent;
   }

   public static function getDocumentDAO()
   {
      return new DocumentDaoEloquent;
   }

   public static function getDocumentTypeDAO()
   {
      return new DocumentTypeDaoEloquent;
   }

   public static function getStudentDAO()
   {
      return new StudentDaoEloquent;
   }

   public static function getSchoolDAO()
   {
      return new SchoolDaoEloquent;
   }

   public static function getAcademicDepartmentDAO()
   {
      return new AcademicDepartmentDaoEloquent;
   }

   public static function getProfessorDAO()
   {
      return new ProfessorDaoEloquent;
   }

   public static function getClaseDAO()
   {
      return new ClaseDaoEloquent;
   }

   public static function getAttendanceDAO()
   {
      return new AttendanceDaoEloquent;
   }

   public static function getGroupDAO()
   {
      return new GroupDaoEloquent;
   }

   public static function getNotificationChannelDAO()
   {
      return new NotificationChannelDaoEloquent;
   }

   public static function getUserTypeDAO()
   {
      return new UserTypeDaoEloquent;
   }

   public static function getFacultadDAO()
   {
      return new FacultadDaoEloquent;
   }

   public static function getAcademicPlanDAO()
   {
      return new AcademicPlanDaoEloquent;
   }

   public static function getClassRoommDAO()
   {
      return new ClassRoomDaoEloquent;
   }

   public static function getAcademicPeriodDAO()
   {
      return new AcademicPeriodDaoEloquent;
   }
}
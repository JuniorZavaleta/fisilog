<?php
namespace FisiLog\DAO\Attendance;
use FisiLog\BusinessClasses\Attendance as AttendanceBusiness;

interface AttendanceDao {
   public function verifyAttendance($user_id, $session_class_id, $register_date);
   public function save(AttendanceBusiness &$attendanceBusiness);
   public function getBySessionClassId($clase_id);
}
<?php
namespace FisiLog\DAO\Attendance;
use FisiLog\BusinessClasses\Attendance as AttendanceBusiness;

interface AttendanceDao {
   public function verifyAttendance($user_id, $clase_id, $date);
   public function save(AttendanceBusiness &$attendanceBusiness);
   public function getByClaseId($clase_id);
}
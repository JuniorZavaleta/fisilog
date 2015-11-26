<?php
namespace FisiLog\DAO\Attendance;
use FisiLog\BusinessClasses\Attendance as AttendanceBusiness;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\BusinessClasses\Clase as ClaseBusiness;
interface AttendanceDao {
	public function getAttendancesByUserAndClaseAndDate(UserBusiness $userBusiness, ClaseBusiness $claseBusiness, $date);
	public function save(AttendanceBusiness $attendanceBusiness);
}
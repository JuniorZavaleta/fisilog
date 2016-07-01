<?php
namespace FisiLog\DAO\Attendance;

use FisiLog\BusinessClasses\Attendance as AttendanceBusiness;

use FisiLog\Models\Attendance as AttendanceModel;

class AttendanceDaoEloquent implements AttendanceDao {

   public function verifyAttendance($user_id, $clase_id, $date)
   {
      $attendance_model = AttendanceModel::where('user_id','=',$user_id)
                                         ->where('class_id','=',$clase_id)
                                         ->where('date','=',$date)
                                         ->first();

      if ($attendance_model == null)
         return false;

      return (boolean)$attendance_model->verified;
   }

   public function save(AttendanceBusiness &$attendanceBusiness)
   {
      $attendance_model = new AttendanceModel;
      $attendance_model->user_id = $attendanceBusiness->getUser()->getId();
      $attendance_model->class_id = $attendanceBusiness->getClase()->getId();
      $attendance_model->date = date('Y-m-d H:i:s');
      $attendance_model->verified = $attendanceBusiness->getVerified();
      $attendance_model->save();
      $attendanceBusiness->setId($attendance_model->id);

      return $attendanceBusiness;
   }

   public function checkAttendance(AttendanceBusiness $attendanceBusiness, $check)
   {
      $attendance_model = AttendanceModel::find($attendanceBusiness->getId());
      $attendance_model->verified = $check;
      $attendance_model->save();
   }

   public function getById($id)
   {
      $attendance_model = AttendanceModel::find($id);

      return static::createBusinessClass($attendance_model);
   }

   public function getByClaseId($clase_id)
   {
      $attendance_models = AttendanceModel::where('class_id', '=', $clase_id)->get();
      $attendances      = [];

      foreach ($attendance_models as $model)
         $attendances[] = static::createBusinessClass($model);

      return $attendances;
   }

   public static function createBusinessClass(AttendanceModel $attendance_model)
   {
      if ($attendance_model == null)
         return null;

      $attendance_business = new AttendanceBusiness;
      $attendance_business->setId($attendance_model->id);
      $attendance_business->setUser($attendance_model->user);
      $attendance_business->setClase($attendance_model->claser);
      $attendance_business->setDate($attendance_model->date);
      $attendance_business->setVerified($attendance_model->verified);

      return $attendance_business;
   }
}

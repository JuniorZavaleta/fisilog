<?php
namespace FisiLog\DAO\Attendance;

use FisiLog\BusinessClasses\Attendance as AttendanceBusiness;

use FisiLog\Models\Attendance as AttendanceModel;

use FisiLog\DAO\User\UserDaoEloquent as UserModel;

use FisiLog\DAO\SessionClass\SessionClassDaoEloquent as SessionClassModel;

class AttendanceDaoEloquent implements AttendanceDao {

   public function verifyAttendance($user_id, $session_class_id)
   {
      $attendance_model = AttendanceModel::where('user_id','=',$user_id)
                                         ->where('session_class_id','=',$session_class_id)
                                         ->first();

      if ($attendance_model == null)
         return false;

      return (boolean)$attendance_model->verified;
   }

   public function save(AttendanceBusiness &$attendanceBusiness)
   {
      $attendance_model = new AttendanceModel;
      $attendance_model->user_id = $attendanceBusiness->getUser()->getId();
      $attendance_model->session_class_id = $attendanceBusiness->getSessionClass()->getId();
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

   public function getBySessionClassId($session_class_id)
   {
      $attendance_models = AttendanceModel::where('session_class_id', '=', $session_class_id)->get();
      $attendances      = [];

      foreach ($attendance_models as $model)
         $attendances[] = static::createBusinessClass($model);

      return $attendances;
   }

   public static function createBusinessClass(AttendanceModel $attendance_model)
   {
      if ($attendance_model == null)
         return null;

      $attendance_business = new AttendanceBusiness(
         UserModel::createBusinessClass($attendance_model->user),
         SessionClassModel::createBusinessClass($attendance_model->session_class),
         $attendance_model->verified,
         $attendance_model->created_at,
         $attendance_model->id
      );

      return $attendance_business;
   }

   public function getAttendancesOfUserByClase($user_id, $clase_id)
   {
      $attendance_models = AttendanceModel::where('user_id', '=', $user_id)
                                          ->whereHas('session_class', function($session_class) use ($clase_id) {
                                             $session_class->where('class_id', '=', $clase_id);
                                          })->get();
      $attendances      = [];

      foreach ($attendance_models as $model)
         $attendances[] = static::createBusinessClass($model);

      return $attendances;
   }

}

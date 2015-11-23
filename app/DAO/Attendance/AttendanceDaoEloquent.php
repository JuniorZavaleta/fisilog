<?php
namespace FisiLog\DAO\Attendance;
use FisiLog\BusinessClasses\Attendance as AttendanceBusiness;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\BusinessClasses\Clase as ClaseBusiness;
use FisiLog\Models\Attendance as AttendanceModel;
use FisiLog\Models\User as UserModel;
use FisiLog\Models\Clase as ClaseModel;

class AttendanceDaoEloquent implements AttendanceDao {
    public function getAttendancesByUserAndClase(
        UserBusiness $userBusiness, 
        ClaseBusiness $claseBusiness) {

    }
    public function save(AttendanceBusiness $attendanceBusiness) {
        $attendanceModel = new AttendanceModel;
        $attendanceModel->user_id = $attendanceBusiness->getUser()->getId();
        $attendanceModel->clase_id = $attendanceBusiness->getClase()->getId();
        $attendanceModel->date = date('Y-m-d H:i:s');
        $attendanceModel->verified = ( $attendanceBusiness->getUser()->getType() == "Estudiante" );
        $attendanceModel->save();
        $attendanceBusiness->setId($attendanceModel->id);

        return $attendanceBusiness;
    }
    public function checkAttendance(AttendanceBusiness $attendanceBusiness, $check) {
        $attendanceModel = AttendanceModel::find($attendanceBusiness->getId());
        $attendanceModel->verified = $check;
        $attendanceModel->save();
    }
    public function getById($id) {
        $attendanceModel    = AttendanceModel::find($id);
        if ($attendanceModel == null)
            return null;
        $attendanceBusiness = new attendanceBusiness;
        $attendanceBusiness->setId($id);
        $attendanceBusiness->setUser($attendanceModel->user);
        $attendanceBusiness->setClase($attendanceModel->claser);
        $attendanceBusiness->setDate($attendanceModel->date);
        $attendanceBusiness->setVerified($attendanceModel->verified);
        return $attendanceBusiness;
    }
    public function all() {
        $attendanceModels = AttendanceModel::all();
        $attendances      = [];
        foreach ($attendanceModels as $model) {
            $attendanceBusiness = new attendanceBusiness;
            $attendanceBusiness->setId($id);
            $attendanceBusiness->setUser($model->user);
            $attendanceBusiness->setClase($model->claser);
            $attendanceBusiness->setDate($model->date);
            $attendanceBusiness->setVerified($model->verified);
            $attendances[] = $attendanceBusiness;
        }
        return $attendances;
    }
    public function getByClase(ClaseBusiness $claseBusiness) {
        $attendanceModels = AttendanceModel::where('class_id', $claseBusiness->getId())->get();
        $attendances      = [];
        foreach ($attendanceModels as $model) {
            $attendanceBusiness = new attendanceBusiness;
            $attendanceBusiness->setId($id);
            $attendanceBusiness->setUser($model->user);
            $attendanceBusiness->setClase($model->claser);
            $attendanceBusiness->setDate($model->date);
            $attendanceBusiness->setVerified($model->verified);
            $attendances[] = $attendanceBusiness;
        }
        return $attendances;
    }
}

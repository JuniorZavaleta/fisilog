<?php
namespace FisiLog\DAO\Student;
use FisiLog\BusinessClasses\Student as StudentBusiness;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\BusinessClasses\Group as GroupBusiness;
use FisiLog\Models\Student as StudentModel;
use FisiLog\BusinessClasses\NotificationByMail;
use FisiLog\BusinessClasses\NotificationChannel;

class StudentDaoEloquent implements StudentDao {
  public function save(StudentBusiness $studentBusiness) {
    $studentModel = new StudentModel;
    $studentModel->user_id = $studentBusiness->getId();
    $studentModel->school_id = $studentBusiness->getSchool()->getId();
    $studentModel->code = $studentBusiness->getCode();
    $studentModel->year_of_entry = $studentBusiness->getYearOfEntry();
    $studentModel->save();
    $studentBusiness->setId($studentModel->id);

    return $studentBusiness;
  }
  public function findByUser(UserBusiness $userBusiness) {
    $studentModel = StudentModel::where('user_id', '=', $userBusiness->getId())
                                ->first();
    if($studentModel == null)
      return null;

    $studentBusiness = new StudentBusiness;
    $studentBusiness->setId($studentModel->id);
    $studentBusiness->setYearOfEntry($studentModel->year_of_entry);
    $studentBusiness->setCode($studentModel->code);

    return $studentBusiness;
  }
  public function getByGroup(GroupBusiness $groupBusiness) {
    $studentModel = StudentModel::whereHas('groups', function($query) use($groupBusiness){
      $query->where('group_id','=',$groupBusiness->getId());
    })->get();

    $studentBusiness = [];
    foreach ($studentModel as $student) {
      $newStudentBusinesss = new StudentBusiness;

      $newStudentBusinesss->setId($student->user->id);
      $newStudentBusinesss->setEmail($student->user->email);
      if( $student->user->notification_channel_id == 1) {
        $notification_channel = new NotificationChannel;
        $notification_channel->setStrategyNotification(new NotificationByMail);
        $newStudentBusinesss->setNotificationChannel($notification_channel);
      }

      $studentBusiness[] = $newStudentBusinesss;
    }

    return $studentBusiness;
  }
}
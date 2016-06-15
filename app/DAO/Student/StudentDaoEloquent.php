<?php
namespace FisiLog\DAO\Student;

use FisiLog\BusinessClasses\Student as StudentBusiness;
use FisiLog\Models\Student as StudentModel;

use FisiLog\DAO\User\UserDaoEloquent as UserDao;
use FisiLog\DAO\School\SchoolDaoEloquent as SchoolDao;

class StudentDaoEloquent implements StudentDao {

   /**
    * Save in DB a student entity
    * @param StudentBusiness $studentBusiness
    * @return
    */
   public function save(StudentBusiness $student_business)
   {
      StudentModel::create($student_business->toArray());

      return $student_business;
   }

   /**
    * Find a student with the user id
    * @param integer $user_id
    * @return StudentBusiness
    */
   public function findByUserId($user_id)
   {
      $student_model = StudentModel::where('id', '=', $user_id)
      ->with('user', 'user.user_type', 'user.notification_channel', 'school')
      ->first();

      return static::createBusinessClass($student_model);
   }

   /**
    * Get a collection of student of a group with the group id
    * @param integer $group_id
    * @return Collection of StudentBusiness
    */
   public function getByGroupId($group_id)
   {
      $students_model = StudentModel::whereHas('groups', function($query) use ($group_id) {
         $query->where('group_id', '=', $group_id);
      })
      ->with('user', 'user.user_type', 'user.notification_channel', 'school')
      ->get();

      $students_business = [];

      foreach ($students_model as $student_model)
         $students_business[] = static::createBusinessClass($student_model);

      return $students_business;
   }

   /**
    * Create an object StudentBusiness
    * @param StudentModel $studentModel
    * @return StudentBusiness
    */
   public function createBusinessClass(StudentModel $studentModel)
   {
      if ($studentModel == null)
         return null;

      $student = new StudentBusiness(
         UserDao::createBusinessClass($studentModel->user),
         SchoolDao::createBusinessClass($studentModel->school),
         $studentModel->year_of_entry,
         $studentModel->code
      );

      return $student;
   }
}
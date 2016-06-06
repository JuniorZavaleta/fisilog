<?php
namespace FisiLog\BusinessClasses;

use FisiLog\BusinessClasses\AcademicDepartment;

use Illuminate\Contracts\Support\Arrayable;

class Professor extends User implements Arrayable {

   protected $academic_department;

   protected $professor_type;

   public static $nombrado_type   = 1;
   public static $contratado_type = 2;
   public static $auxiliar_type   = 3;

   public static $nombrado_type_name   = "Nombrado";
   public static $contratado_type_name = "Contratado";
   public static $auxiliar_type_name   = "Auxiliar";

   public function __construct(User $user, $academic_department, $type)
   {
      $this->id = $user->getId();
      $this->name = $user->getName();
      $this->last_name = $user->getLastName();
      $this->email = $user->getEmail();
      $this->password = $user->getPassword();
      $this->phone = $user->getPhone();
      $this->user_type = $user->getUserType();
      $this->photo_url = $user->getPhotoUrl();
      $this->notification_channel = $user->getNotificationChannel();
      $this->setAcademicDepartment($academic_department);
      $this->setProfessorType($type);
   }

   public function setAcademicDepartment(AcademicDepartment $academicDepartment)
   {
      $this->academicDepartment = $academicDepartment;
   }

   public function getAcademicDepartment()
   {
      return $this->academicDepartment;
   }

   public function setProfessorType($professor_type)
   {
      $this->professor_type = $professor_type;
   }

   public function getProfessorType()
   {
      return $this->professor_type;
   }

   /**
     * Get the instance as an array.
     *
     * @return array
     */
   public function toArray()
   {
      return [
         'id' => $this->id,
         'name' => $this->name,
         'last_name' => $this->last_name,
         'email' => $this->email,
         'password' => $this->password,
         'phone' => $this->phone,
         'notification_channel_id' => $this->notification_channel->getId(),
         'notification_channel' => $this->notification_channel->toArray(),
         'photo_url' => $this->photo_url,
         'user_type_id' => $this->user_type->getId(),
         'user_type' => $this->user_type->toArray(),
         'school_id' => $this->academic_department->getId(),
         'academic_department_id' => $this->academic_department->getId(),
         'academic_department' => $this->academic_department->toArray(),
         'professor_type' => $this->professor_type,
      ];
   }
}

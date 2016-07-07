<?php
namespace FisiLog\BusinessClasses;

class Attendance {

   private $id;

   private $session_class;

   private $user;

   private $register_time;

   public function __construct($user, $session_class, $verified = false, $register_time = null, $id = null)
   {
      $this->setUser($user);
      $this->setSessionClass($session_class);
      $this->verified = $verified;
      $this->register_time = $register_time;
      $this->id = $id;
   }

   public function setId($id)
   {
      $this->id = $id;
   }

   public function getId()
   {
      return $this->id;
   }

   public function setUser(User $user)
   {
      $this->user = $user;
   }

   public function getUser()
   {
      return $this->user;
   }

   public function setSessionClass(SessionClass $session_class)
   {
      $this->session_class = $session_class;
   }

   public function getSessionClass()
   {
      return $this->session_class;
   }

   public function setVerified($verified)
   {
      $this->verified = $verified;
   }

   public function getVerified()
   {
      return $this->verified;
   }

   public function setRegisterTime($register_time)
   {
      $this->register_time = $register_time;
   }

   public function getRegisterTime()
   {
      return $this->register_time;
   }

   public static function verifyDateAndAttendanceDate($clase)
   {
      $start_hour = $clase->start_hour;
      $end_hour = $clase->end_hour;
      $day_id = date("N");
      $day = Attendance::getDayChar($day_id);
      $current_hour = date('H:i:s');

      if ($day == $clase->day){
         if($start_hour <= $current_hour && $end_hour >= $current_hour)
            return true;
      }
      return false;
   }

   public static function getDayChar($day_id)
   {
      switch ($day_id) {
         case 1:
            return 'L';
            break;
         case 2:
            return 'M';
            break;
         case 3:
            return 'X';
            break;
         case 4:
            return 'J';
            break;
         case 5:
            return 'V';
            break;
         case 6:
            return 'S';
            break;
         case 7:
            return 'D';
            break;
      }
   }
}
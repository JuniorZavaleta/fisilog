<?php
namespace FisiLog\BusinessClasses;

class Attendance {

   private $id;

   private $sesion_class;

   private $user;

   private $register_time;

   public function __construct($user, $sesion_class, $verified = false, $register_time = null, $id = null)
   {
      $this->setUser($user);
      $this->setSessionClass($sesion_class);
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

   public function setSessionClass(SessionClass $sesion_class)
   {
      $this->sesion_class = $sesion_class;
   }

   public function getSessionClass()
   {
      return $this->sesion_class;
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
}
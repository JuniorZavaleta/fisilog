<?php
namespace FisiLog\BusinessClasses;

use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\School;

class Student extends User {

   /**
    * @var School
    */
   private $school;

   /**
    * @var integer
    */
   private $yearOfEntry;

   /**
    * @var string
    */
   private $code;

   /**
    * @var Collection of Group
    */
   private $groups;

   /**
    * Description
    * @param string $name
    * @param string $last_name
    * @param string $email
    * @param string $password
    * @param string $phone
    * @param UserType $user_type
    * @param string $photo_url
    * @param NotificationChannel $notification_channel
    * @param School $school
    * @param integer $yearOfEntry
    * @param integer $code
    * @return type
    */
   public function __construct($name, $last_name, $email, $password, $phone, $user_type, $photo_url, $notification_channel, $school, $yearOfEntry, $code)
   {
      parent::__construct($name, $last_name, $email, $password, $phone, $user_type, $photo_url, $notification_channel);
      $this->setSchool($school);
      $this->yearOfEntry = $yearOfEntry;
      $this->code = $code;
   }

   /**
    * Description
    * @param School $school
    * @return type
    */
   public function setSchool(School $school)
   {
      $this->school = $school;
   }

}
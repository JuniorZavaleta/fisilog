<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class Student extends User implements Arrayable {

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

   public function __construct(User $user, $school, $yearOfEntry, $code)
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
         'school_id' => $this->school->getId(),
         'school' => $this->school->toArray(),
         'code' => $this->code,
         'year_of_entry' => $this->yearOfEntry,
      ];
   }
}
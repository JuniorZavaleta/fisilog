<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use Image;

class User implements Arrayable {

   /**
    * The id of the user in the DB
    *
    * @var integer
    */
   protected $id;

   /**
    * The name of the user
    *
    * @var string
    */
   protected $name;

   /**
    * The last name of the user
    *
    * @var string
    */
   protected $last_name;

   /**
    * The email of the user
    *
    * @var string
    */
   protected $email;

   /**
    * The phone of contact of the user
    *
    * @var string
    */
   protected $phone;

   /**
    * The password of the user
    *
    * @var string
    */
   protected $password;

   /**
    * The type of the user
    *
    * @var UserType
    */
   protected $user_type;

   /**
    * The url of a photo of the user
    *
    * @var string
    */
   protected $photo_url;

   /**
    * @var NotificationChannel
    */
   protected $notification_channel;

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
    * @return
    */
   public function __construct($name, $last_name, $email, $password, $phone, $user_type, $photo_url, $notification_channel)
   {
      $this->name = $name;
      $this->last_name = $last_name;
      $this->email = $email;
      $this->password = bcrypt($password);
      $this->phone = $phone;
      $this->setUserType($user_type);
      $this->photo_url = $photo_url;
      $this->setNotificationChannel($notification_channel);
   }

   public function getName()
   {
      return $this->name;
   }

   public function getLastName()
   {
      return $this->last_name;
   }

   public function getEmail()
   {
      return $this->email;
   }

   public function getPassword()
   {
      return $this->password;
   }

   public function getPhone()
   {
      return $this->phone;
   }

   public function getUserType()
   {
      return $this->user_type;
   }

   public function getPhotoUrl()
   {
      return $this->photo_url;
   }

   public function getNotificationChannel()
   {
      return $this->notification_channel;
   }

   public function setPhotoUrl($photo_url)
   {
      if (! is_string($photo_url)) {
         $filename  = time() . '.' . $photo_url->getClientOriginalName();
         $url = "img/users/" . $filename;
         $path = public_path($url);
         // resize image
         Image::make($photo_url->getRealPath())
         ->save($path);
      } else {
         $this->photo_url = $photo_url;
      }
   }

   public function setUserType(UserType $user_type)
   {
      $this->user_type = $user_type;
   }

   public function setNotificationChannel(NotificationChannel $notification_channel)
   {
      $this->notification_channel = $notification_channel;
   }

   /**
    * Determine is the user is a student
    * @param FisiLog/BusinessClasses/User $user
    * @return bool
    */
   public function isStudent()
   {
      if ($this instanceof Student )
         return true;

      return $this->getUserTypeName() == 'student';
   }

   /**
    * Determine if the user is a teacher
    * @param FisiLog/BusinessClasses/User $user
    * @return bool
    */
   public function isTeacher()
   {
      if ($this instanceof Teacher )
         return true;

      return $this->getUserTypeName() == 'teacher';
   }

   /**
    * Get the name of the user type
    * @return string
    */
   protected function getUserTypeName()
   {
      return $this->user_type->getName();
   }

   /**
     * Get the instance as an array.
     *
     * @return array
     */
   public function toArray()
   {
      return [
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
      ];
   }
}
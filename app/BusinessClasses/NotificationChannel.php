<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class NotificationChannel implements Arrayable {

   protected $id;

   protected $name;

   private $notificator;

   const SMS = 1;
   const EMAIL = 2;
   const TELEGRAM = 3;

   public function __construct($name, $id = null)
   {
      $this->name = $name;
      $this->id = $id;
      if ($this->id == self::SMS) {
         //To-Do
      } elseif($this->id == self::EMAIL) {
         $this->setStrategyNotification(new NotificationByMail);
      } elseif($this->id == self::TELEGRAM) {
         $this->setStrategyNotification(new NotificationByTelegram);
      }
   }

   public function setStrategyNotification(Notificator $strategyNotification)
   {
      $this->notificator = $strategyNotification;
   }

   public function executeStrategyNotification($view, $data, $subject, $to)
   {
      $this->notificator->notify($view, $data, $subject, $to);
   }

   public function getId()
   {
      return $this->id;
   }

   /**
     * Get the instance as an array.
     *
     * @return array
     */
   public function toArray() {
      return [
         'id' => $this->id,
         'name' => $this->name,
      ];
   }
}
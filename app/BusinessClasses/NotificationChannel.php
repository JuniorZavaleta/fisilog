<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class NotificationChannel implements Arrayable {

   protected $id;

   protected $name;

   private $notificator;

   public function __construct($name, $id = null)
   {
      $this->name = $name;
      $this->id = $id;
   }

   public function setStrategyNotification(Notificator $strategyNotification) {
      $this->notificator = $strategyNotification;
   }

   public function executeStrategyNotification($message, $subject, $to) {
      $this->notificator->notify($message, $subject, $to);
   }

   public function getId() {
      return $this->id;
   }

   /**
     * Get the instance as an array.
     *
     * @return array
     */
   public function toArray() {
      return [
         'name' => $this->name,
      ];
   }
}
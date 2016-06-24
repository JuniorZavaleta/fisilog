<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class SessionClass {

   private $id;

   private $clase;

   private $session_date;

   private $status;

   public function __construct($clase, $session_date, $status, $id)
   {
      $this->setClase($clase);
      $this->session_date = $session_date;
      $this->status = $status;
      $this->id = $id;
   }

   public function setClase(Clase $clase)
   {
      $this->clase = $clase;
   }

   public function getClase()
   {
      return $this->clase;
   }

   public function setSessionDate($date)
   {
      $this->date = $date;
   }

   public function getSessionDate()
   {
      return $this->date;
   }

   public function setStatus($status)
   {
      $this->status = $status;
   }

   public function getStatus()
   {
      return $this->status;
   }

   public function setId($id)
   {
      $this->id = $id;
   }

   public function getId($id)
   {
      return $this->id;
   }

   public function getClaseId()
   {
      return $this->clase->getId();
   }

   /**
     * Get the instance as an array.
     *
     * @return array
     */
   public function toArray() {
      return [
         'id' => $this->id,
         'clase' => $this->getClase()->toArray(),
         'clase_id' => $this->getClaseId();
         'session_date' => $this->session_date,
         'status' => $this->status,
      ];
   }


}
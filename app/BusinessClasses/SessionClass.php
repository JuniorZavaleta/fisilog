<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use FisiLog\Helpers\TimeHelper;

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

   public function getStartHour()
   {
      return $this->clase->getStartHour();
   }

   public function getQuantityOfMinutes()
   {
      return $this->clase->getQuantityOfMinutes();
   }

   public function getDeadlineMessage()
   {
      if ($this->status == 'S') //Sin iniciar
      {
         $today = date('Y-m-d');
         if ($today == $this->session_date)
         {
            $start_hour = $this->getStartHour();
            $actual_hour = date('H:i:s');

            if ($start_hour > $actual_hour)
            {
               $diff_minutes = TimeHelper::getMinutesBetween($actual_hour, $start_hour);

               if ($diff_minutes <= 120)
                  return 'Faltan '. $diff_minutes . ' minutos para que empiece la clase';
               else
                  return 'Faltan más de 2 horas para que empiece la clase';
            }

            $diff_minutes = TimeHelper::getMinutesBetween($start_hour, $actual_hour);

            $minutes_tolerance = $this->getQuantityOfMinutes();

            if ($diff_minutes > $minutes_tolerance)
               return 'Pide lista papu';
            else
               return 'Quedan ' . ($minutes_tolerance - $diff_minutes) . ' minutos de tolerancia';
         }

         return 'La clase no esta programada para hoy';
      }
      elseif ($this->status == 'C') // Cancelada
      {
         return 'Que esperas, si la clase fue cancelada';
      }
      elseif ($this->status == 'I') // Iniciada
      {
         return 'Apresurate!, Clase en curso';
      }

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
         'clase_id' => $this->getClaseId(),
         'session_date' => $this->session_date,
         'status' => $this->status,
      ];
   }


}
<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class Clase {

   private $id;

   private $classroom;

   private $professor;

   private $group;

   private $type;

   private $start_hour;

   private $end_hour;

   private $day_of_the_week;

   public function setId($id)
   {
      $this->id = $id;
   }

   public function getId()
   {
      return $this->id;
   }

   public function setClassRoom(ClassRoom $classroom)
   {
      $this->classroom = $classroom;
   }

   public function getClassRoom()
   {
      return $this->classroom;
   }

   public function setProfessor(Professor $professor)
   {
      $this->professor = $professor;
   }

   public function getProfessor()
   {
      return $this->professor;
   }

   public function setGroup($group)
   {
      $this->group = $group;
   }

   public function getGroup()
   {
      return $this->group;
   }

   public function setType($type)
   {
      $this->type = $type;
   }

   public function getType()
   {
      return $this->type;
   }

   public function setStartHour($start_hour)
   {
      $this->start_hour = $start_hour;
   }

   public function getStartHour()
   {
      return $this->start_hour;
   }

   public function setEndHour($end_hour)
   {
      $this->end_hour = $end_hour;
   }

   public function setEndHour()
   {
      return $this->end_hour;
   }

   public function setDayOfTheWeek($day_of_the_week)
   {
      $this->day_of_the_week = $day_of_the_week;
   }

   public function getDayOfTheWeek()
   {
      return $this->day_of_the_week;
   }

   /**
     * Get the instance as an array.
     *
     * @return array
     */
   public function toArray() {
      return [
         'id' => $this->id,
      ];
   }

}
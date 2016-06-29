<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use FisiLog\Helpers\TimeHelper;

class Clase {

   private $id;

   private $classroom;

   private $professor;

   private $group;

   private $class_type;

   private $start_hour;

   private $end_hour;

   private $day_of_the_week;

   private $course;

   public function __construct($classroom, $professor, $group, $course, $start_hour, $end_hour, $day_of_the_week, $class_type, $id = null)
   {
      $this->setClassRoom($classroom);
      $this->setProfessor($professor);
      $this->setGroup($group);
      $this->setCourse($course);
      $this->start_hour = $start_hour;
      $this->end_hour = $end_hour;
      $this->day_of_the_week = $day_of_the_week;
      $this->class_type = $class_type;
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

   public function setGroup(Group $group)
   {
      $this->group = $group;
   }

   public function getGroup()
   {
      return $this->group;
   }

   public function setClassType($class_type)
   {
      $this->class_type = $class_type;
   }

   public function getClassType()
   {
      return $this->class_type;
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

   public function getEndHour()
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

   public function setCourse(Course $course)
   {
      $this->course = $course;
   }

   public function getCourse($course)
   {
      return $this->course;
   }

   public function getClassRoomName()
   {
      return $this->classroom->getName();
   }

   public function getGroupId()
   {
      return $this->group->getId();
   }

   public function getGroupNumber()
   {
      return $this->group->getNumberOfGroup();
   }

   public function getSchedule()
   {
      return date('H:i', strtotime($this->start_hour)). ' - ' . date('H:i', strtotime($this->end_hour));
   }

   public function getProfessorFullName()
   {
      return $this->professor->getFullName();
   }

   public function getQuantityOfMinutes()
   {
      return TimeHelper::getMinutesBetween($this->start_hour, $this->end_hour);
   }

   public function getCourseName()
   {
      return $this->course->getName();
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
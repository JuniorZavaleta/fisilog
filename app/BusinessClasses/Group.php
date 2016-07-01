<?php
namespace FisiLog\BusinessClasses;

use FisiLog\BusinessClasses\CourseOpened;
use FisiLog\BusinessClasses\Clase;

class Group {

   private $id;

   private $courseOpened;

   private $number_of_group;

   private $clases;

   public function __construct($number_of_group, $id = null)
   {
      $this->number_of_group = $number_of_group;
      $this->id = $id;
      $clases = [];
   }

   public function setId($id)
   {
      $this->id = $id;
   }

   public function getId()
   {
      return $this->id;
   }

   public function setCourseOpened(CourseOpened $courseOpened)
   {
      $this->courseOpened = $courseOpened;
   }

   public function getCourseOpened()
   {
      return $this->courseOpened;
   }

   public function setNumberOfGroup($number_of_group)
   {
      $this->number_of_group = $number_of_group;
   }

   public function getNumberOfGroup()
   {
      return $this->number_of_group;
   }

   public function addClase(Clase $clase)
   {
      $this->clases[] = $clase;
   }

   public function getClases()
   {
      return $this->clases;
   }

}
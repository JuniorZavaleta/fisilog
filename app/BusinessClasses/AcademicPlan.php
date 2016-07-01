<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use FisiLog\BusinessClasses\School;

class AcademicPlan implements Arrayable {

   private $id;

   private $school;

   private $year_of_publication;

   private $is_active;

   private $name;

   public function __construct($name, $school, $year_of_publication, $is_active = false, $id = null)
   {
      $this->name = $name;
      $this->school = $school;
      $this->year_of_publication = $year_of_publication;
      $this->is_active = $is_active;
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

   public function setName($name)
   {
      $this->name = $name;
   }

   public function getName()
   {
      return $this->name;
   }

   public function setSchool(School $school)
   {
      $this->school = $school;
   }

   public function getSchool()
   {
      return $this->school;
   }

   public function setYearOfPublication($year_of_publication)
   {
      $this->year_of_publication = $year_of_publication;
   }

   public function getYearOfPublication()
   {
      return $this->year_of_publication;
   }

   public function activate()
   {
      $this->is_active = true;
   }

   public function desactivate()
   {
      $this->is_active = false;
   }

   public function isActive()
   {
      return $this->is_active;
   }

   public function getSchoolId()
   {
      return $this->school->getId();
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
         'school_id' => $this->getSchoolId(),
         'school' => $this->school->toArray(),
         'year_of_publication' => $this->year_of_publication,
         'is_active' => $this->is_active,
      ];
   }

}
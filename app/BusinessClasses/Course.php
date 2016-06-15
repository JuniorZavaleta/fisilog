<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use FisiLog\BusinessClasses\AcademicPlan;

class Course implements Arrayable {

   private $id;

   private $name;

   private $code;

   private $quantity_of_credits;

   private $academic_plan;

   private $ciclo;

   private $course_type;

   public function __construct($name, $code, $quantity_of_credits, $academic_plan, $ciclo, $course_type, $id = null)
   {
      $this->name = $name;
      $this->code = $code;
      $this->quantity_of_credits = $quantity_of_credits;
      $this->setAcademicPlan($academic_plan);
      $this->ciclo = $ciclo;
      $this->setCourseType($course_type);
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

   public function setCode($code)
   {
      $this->code = $code;
   }

   public function getCode()
   {
      return $this->code;
   }

   public function setQuantityOfCredits($quantity_of_credits)
   {
      $this->quantity_of_credits = $quantity_of_credits;
   }

   public function getQuantityOfCredits()
   {
      return $this->quantity_of_credits;
   }

   public function setAcademicPlan(AcademicPlan $academic_plan)
   {
      $this->academic_plan = $academic_plan;
   }

   public function getAcademicPlan()
   {
      return $this->academic_plan;
   }

   public function setCiclo($ciclo)
   {
      $this->ciclo = $ciclo;
   }

   public function getCiclo()
   {
      return $this->ciclo;
   }

   public function setCourseType(CourseType $course_type)
   {
      $this->course_type = $course_type;
   }

   public function getCourseType()
   {
      return $this->course_type;
   }

   public function getAcademicPlanId()
   {
      return $this->academic_plan->getId();
   }

   public function getCourseTypeId()
   {
      return $this->course_type->getId();
   }

   public function getCourseTypeName()
   {
      return $this->course_type->getName();
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
         'code' => $this->code,
         'quantity_of_credits' => $this->quantity_of_credits,
         'academic_plan_id' => $this->getAcademicPlanId(),
         'ciclo' => $this->ciclo,
         'course_type_id' => $this->getCourseTypeId(),
         'course_type' => $this->course_type->toArray(),
      ];
   }

}
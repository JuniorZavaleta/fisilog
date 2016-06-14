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

   public function __construct($name, $code, $quantity_of_credits, $academic_plan, $id = null)
   {
      $this->name = $name;
      $this->code = $code;
      $this->quantity_of_credits = $quantity_of_credits;
      $this->setAcademicPlan($academic_plan);
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

   public function getAcademicPlanId()
   {
      return $this->academic_plan->getId();
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
      ];
   }

}
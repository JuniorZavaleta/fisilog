<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class AcademicDepartment implements Arrayable {

   protected $id;

   protected $name;

   public function __construct($id, $name)
   {
      $this->id = $id;
      $this->name = $name;
   }

   public function getId()
   {
      return $this->id;
   }

   public function getName()
   {
      return $this->name;
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
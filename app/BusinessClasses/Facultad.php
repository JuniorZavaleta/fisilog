<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class Facultad implements Arrayable {

   private $id;

   private $name;

   private $code;

   public function __construct($name, $code, $id = null)
   {
      $this->name = $name;
      $this->code = $code;
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
      ];
   }
}
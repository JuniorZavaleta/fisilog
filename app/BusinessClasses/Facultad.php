<?php
namespace FisiLog\BusinessClasses;

class Facultad {

   private $id;

   private $name;

   private $code;

   public function __construct($name, $code, $id = null)
   {
      $this->name = $name;
      $this->code = $code;
      $this->id = $id;
   }

   public function getId()
   {
      return $this->id;
   }

   public function getName()
   {
      return $this->name;
   }

   public function getCode()
   {
      return $this->code;
   }
}
<?php
namespace FisiLog\BusinessClasses;

use FisiLog\BusinessClasses\Facultad;

class School {
   /**
    * @var integer
    */
   private $id;

   /**
    * @var string
    */
   private $name;

   /**
    * @var Facultad
    */
   private $facultad;

   /**
    * @var string
    */
   private $code;

   /**
    * Description
    * @param string $name
    * @param string $code
    * @param Facultad $facultad
    * @param integer $id
    * @return
    */
   public function __construct($name, $code, $facultad, $id == null)
   {
      $this->name = $name;
      $this->code = $code;
      $this->setFacultad($facultad);
   }

   public function getId()
   {
      return $this->id;
   }

   public function getName()
   {
      return $this->name;
   }

   public function setFacultad(Facultad $facultad)
   {
      $this->facultad = $facultad;
   }

   public function getFacultad()
   {
      return $this->facultad;
   }

   public function getCode()
   {
      return $this->code;
   }
}
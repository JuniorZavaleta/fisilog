<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use FisiLog\BusinessClasses\Facultad;

class School implements Arrayable {
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
   public function __construct($name, $code, $facultad, $id = null)
   {
      $this->name = $name;
      $this->code = $code;
      $this->facultad = $facultad;
      $this->id = $id;
      $this->setFacultad($facultad);
   }

   public function setId($id)
   {
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

   public function getFacultadName()
   {
      return $this->facultad->getName();
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
         'code' => $this->code,
         'facultad_id' => $this->facultad->getId(),
         'facultad' => $this->facultad,
      ];
   }
}
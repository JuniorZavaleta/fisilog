<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

class ClassRoom {

   private $id;

   private $name;

   private $facultad;

   public function __construct($name, $facultad, $id = null)
   {
      $this->name = $name;
      $this->setFacultad($facultad);
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

   public function setFacultad(Facultad $facultad)
   {
      $this->facultad = $facultad;
   }

   public function getFacultad()
   {
      return $this->facultad;
   }

   public function getFacultadId()
   {
      return $this->facultad->getId();
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
         'facultad_id' => $this->getFacultadId(),
         'facultad' => $this->facultad->toArray(),
      ];
   }

}
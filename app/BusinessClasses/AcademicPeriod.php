<?php
namespace Fisilog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use Fisilog\BusinessClasses\Facultad;
use DateTime;

class AcademicPeriod implements Arrayable {

   protected $id;

   protected $name;

   protected $start_date;

   protected $end_date;

   protected $facultad;

   public function __construct($facultad, $name, $start_date, $end_date)
   {
      $sdate = DateTime::createFromFormat('d/m/Y', $start_date);
      $edate = DateTime::createFromFormat('d/m/Y', $end_date);
      $this->name = $name;
      $this->start_date = $sdate->format('Y-m-d');
      $this->end_date = $edate->format('Y-m-d');
      $this->facultad = $facultad;
   }

   public function getId()
   {
      return $this->id;
   }

   public function setId($id)
   {
      return $this->id = $id;
   }

   public function getName()
   {
      return $this->name;
   }

   public function getStartDate()
   {
      return $this->start_date;
   }

   public function getEndDate()
   {
      return $this->end_date;
   }

   public function getFacultad()
   {
      return $this->facultad;
   }

   public function setFacultad(Facultad $facultad)
   {
      return $this->facultad = $facultad;
   }

   public function getFacultadId()
   {
      return $this->facultad->getId();
   }

   public function toArray()
   {
      return [
         'name' => $this->name,
         'start_date' => $this->start_date,
         'end_date' => $this->end_date,
         'facultad_id' => $this->getFacultadId(),
         'facultad' => $this->facultad->toArray(),
      ];
   }
}
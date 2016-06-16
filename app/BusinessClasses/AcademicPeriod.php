<?php
namespace Fisilog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use Fisilog\BusinessClasses\Facultad;

class AcademicPeriod implements Arrayable {
   protected $id;

   protected $name;

   protected $start_date;

   protected $end_date;

   protected $facultad;

   public function __construct(Facultad $facultad, $id, $name, $start_date, $end_date)
   {
      $this->id = $id;
      $this->name = $name;
      $this->start_date = $start_date;
      $this->end_date = $end_date;
      $this->facultad_id = $facultad->getId();
   }

   public function getId()
   {
      return $this->id;
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

   public function toArray()
   {
      return [
         'id' => $this->id,
         'name' => $this->name,
         'start_date' => $this->start_date,
         'end_date' => $this->end_date,
         'facultad_id' => $this->facultad->getId(),
      ];
   }
}
<?php
namespace FisiLog\DAO\Facultad;

use FisiLog\BusinessClasses\Facultad as FacultadBusiness;
use FisiLog\Models\Facultad as FacultadModel;

class FacultadDaoEloquent implements FacultadDao {

   public function findById($id)
   {
      $facultad_model = FacultadModel::find($id);

      return static::createBusinessClass($facultad_model);
   }

   public function getAll()
   {
      $facultades_model = FacultadModel::all();
      $facultades_business = [];

      foreach ($facultades_model as $facultad_model)
         $facultades_business[] = static::createBusinessClass($facultad_model);

      return $facultades_business;
  }

   public static function createBusinessClass(FacultadModel $facultad_model)
   {
      if ($facultad_model == null)
         return null;

      $facultad_business = new FacultadBusiness(
         $facultad_model->name,
         $facultad_model->code,
         $facultad_model->id
      );

      return $facultad_business;
   }

}
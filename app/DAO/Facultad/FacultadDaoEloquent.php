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

   public function save(FacultadBusiness &$facultad_business)
   {
      $facultad_model = FacultadModel::create($facultad_business->toArray());
      $facultad_business->setId($facultad_model->id);
   }

   public function update(FacultadBusiness $facultad_business)
   {
      $facultad_model = FacultadModel::find($facultad_business->getId());
      $facultad_model->fill($facultad_business->toArray());
      $facultad_model->save();
   }

}
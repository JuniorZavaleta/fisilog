<?php
namespace FisiLog\DAO\School;

use FisiLog\BusinessClasses\School as SchoolBusiness;
use FisiLog\Models\School as SchoolModel;

use FisiLog\DAO\Facultad\FacultadDaoEloquent as FacultadModel;

class SchoolDaoEloquent implements SchoolDao {

   /**
    * Find a school with the id
    * @param integer $id
    * @return SchoolBusiness
    */
   public function findById($id)
   {
      $school_model = SchoolModel::find($id);

      return static::createBusinessClass($school_model);
   }

   /**
    * Get all the schools
    * @return Collection of SchoolBusiness
    */
   public function getAll()
   {
      $schools_model = SchoolModel::all();

      $schools_business = [];

      foreach ($schools_model as $school_model)
         $schools_business[] = static::createBusinessClass($school_model);

      return $schools_business;
   }

    /**
    * Create an object SchoolBusiness
    * @param SchoolModel $schoolModel
    * @return SchoolBusiness
    */
   public static function createBusinessClass(SchoolModel $school_model)
   {
      if ($school_model == null)
         return null;

      $school_business = new SchoolBusiness(
         $school_model->name,
         $school_model->code,
         FacultadModel::createBusinessClass($school_model->facultad),
         $school_model->id
      );

      return $school_business;
   }

   public function save(SchoolBusiness &$school_business)
   {
      $school_model = SchoolModel::create($school_business->toArray());
      $school_business->setId($school_model->id);
   }

   public function update(SchoolBusiness $school_business)
   {
      $school_model = SchoolModel::find($school_business->getId());
      $school_model->fill($school_business->toArray());
      $school_model->save();
   }

   public function getByFacultadId($facultad_id)
   {
      $schools_model = SchoolModel::where('facultad_id', $facultad_id)->get();

      $schools_business = [];

      foreach ($schools_model as $school_model)
         $schools_business[] = static::createBusinessClass($school_model);

      return $schools_business;
   }

}
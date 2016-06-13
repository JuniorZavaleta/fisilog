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

      $schoolBusiness = [];

      foreach ($schools_model as $school_model)
         $schoolBusiness[] = static::createBusinessClass($school_model);

      return $schoolBusiness;
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

      $student = new SchoolBusiness(
         $school_model->name,
         $school_model->code,
         FacultadModel::createBusinessClass($school_model->facultad),
         $school_model->id
      );

      return $student;
   }

}
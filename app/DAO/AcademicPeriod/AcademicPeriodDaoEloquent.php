<?php
namespace FisiLog\DAO\AcademicPeriod;

use FisiLog\BusinessClasses\AcademicPeriod as AcademicPeriodBusiness;
use FisiLog\Models\AcademicPeriod as AcademicPeriodModel;

use FisiLog\DAO\FacultadDao\FacultadDaoEloquent as FacultadDao;

class AcademicPeriodDaoEloquent implements AcademicPeriodDao {

   public function findById($id)
   {
      $academic_period_model = AcademicPeriodModel::find($id);

      return static::createBusinessClass($academic_period_model);
   }

   public function getAll()
   {
      $academic_periods_model = AcademicPeriodModel::all();
      $academic_periods_business = [];

      foreach ($academic_periods_model as $academic_period_model)
         $academic_periods_business[] = static::createBusinessClass($academic_period_model);

      return $academic_periods_business;
   }

   public function save(AcademicPeriodBusiness $academic_periods_business)
   {
      $academic_period_model = AcademicPeriodModel::create($academic_period_business->toArray());
   }

   public function getByFacultyId($facultad_id)
   {
      $academic_period_model = AcademicPeriodModel::where('facultad_id', '=', $facultad_id)->get();
      $academic_periods_business = [];

      foreach ($academic_periods_model as $academic_period_model)
         $academic_periods_business[] = static::createBusinessClass($academic_period_model);

      return $academic_periods_business;
   }

   public static function createBusinessClass(AcademicPeriodModel $academic_period_model)
   {
      if ($academic_period_model == null)
         return null;

      $academic_period_business = new AcademicPeriodBusiness(
         FacultadDao::createBusinessClass($academic_period_model->facultad)
         $academic_period_model->id,
         $academic_period_model->name,
         $academic_period_model->start_date,
         $academic_period_model->end_date
      );

      return $academic_period_business;
   }

}
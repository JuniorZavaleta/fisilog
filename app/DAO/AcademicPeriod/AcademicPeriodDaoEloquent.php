<?php
namespace FisiLog\DAO\AcademicPeriod;

use FisiLog\BusinessClasses\AcademicPeriod as AcademicPeriodBusiness;
use FisiLog\Models\AcademicPeriod as AcademicPeriodModel;

use FisiLog\DAO\Facultad\FacultadDaoEloquent as FacultadModel;

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

   public function save(AcademicPeriodBusiness &$academic_period_business)
   {
      $today = date('Y-m-d');

      $academic_period = AcademicPeriodModel::where('start_date', '<=', $today)
      ->where('end_date', '>=', $today)
      ->where('facultad_id', '=', 20)
      ->first();

      $academic_period_model = AcademicPeriodModel::create($academic_period_business->toArray());
      $academic_period_business->setId($academic_period_model->id);
   }

   public function update(AcademicPeriodBusiness $academic_period_business)
   {
      $academic_period_model = AcademicPeriodModel::find($academic_period_business->getId());
      $academic_period_model->fill($academic_period_business->toArray());
      $academic_period_model->save();
   }

   public function getByFacultyId($facultad_id)
   {
      $academic_periods_model = AcademicPeriodModel::where('facultad_id', '=', $facultad_id)->get();
      $academic_periods_business = [];

      foreach ($academic_periods_model as $academic_period_model)
         $academic_periods_business[] = static::createBusinessClass($academic_period_model);

      return $academic_periods_business;
   }

   public function getPresentPeriodByFacultyId($facultad_id)
   {
      $today = date('Y-m-d');
      $present_academic_period = AcademicPeriodModel::where('faculty_id', '=', $faculty_id)
      ->where('start_date', '<=', $today)
      ->where('end_date', '>=', $today)
      ->first();

      return $present_academic_period;
   }

   public static function createBusinessClass(AcademicPeriodModel $academic_period_model)
   {
      if ($academic_period_model == null)
         return null;

      $academic_period_business = new AcademicPeriodBusiness(
         FacultadModel::createBusinessClass($academic_period_model->facultad),
         $academic_period_model->id,
         $academic_period_model->name,
         $academic_period_model->start_date,
         $academic_period_model->end_date
      );

      return $academic_period_business;
   }

}
<?php
namespace FisiLog\DAO\SessionClass;

use FisiLog\BusinessClasses\SessionClass as SessionClassBusiness;
use FisiLog\Models\SessionClass as SessionClassModel;

use FisiLog\DAO\Clase\ClaseDaoEloquent as ClaseModel;

class SessionClassDaoEloquent implements SessionClassDao {

   public function findNextSessionClass($clase_id)
   {
      $start_date = date('Y-m-d', strtotime('-1 day'));
      $end_date = date('Y-m-d', strtotime('+1 week'));

      $session_class_model = SessionClassModel::where('session_date', '>=', $start_date)
      ->where('session_date', '<=', $end_date)
      ->where('class_id', '=', $clase_id)
      ->first();

      return static::createBusinessClass($session_class_model);
   }

   public function getByClaseId($clase_id)
   {
      $sessions_class_model = SessionClassModel::where('class_id', '=', $clase_id)->get();

      $sessions_class_business = [];

      foreach ($sessions_class_model as $session_class_model)
         $sessions_class_business[] = static::createBusinessClass($session_class_model);

      return $sessions_class_business;
   }

   public static function createBusinessClass($session_class_model)
   {
      if (is_null($session_class_model))
         return null;

      $session_class_business = new SessionClassBusiness(
         ClaseModel::createBusinessClass($session_class_model->clase),
         $session_class_model->session_date,
         $session_class_model->status,
         $session_class_model->id
      );

      return $session_class_business;
   }
}
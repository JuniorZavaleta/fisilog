<?php
namespace FisiLog\DAO\SessionClass;

use FisiLog\BusinessClasses\SessionClass as SessionClassBusiness;
use FisiLog\Models\SessionClass as SessionClassModel;

use FisiLog\DAO\Clase\ClaseDaoEloquent as ClaseModel;

class SessionClassDaoEloquent implements SessionClassDao {

   public function findSessionClassToNextWeek($clase_id)
   {
      $start_date = date('Y-m-d', strtotime('-1 day'));
      $end_date = date('Y-m-d', strtotime('+1 week'));

      $session_class_model = SessionClassModel::where('session_date', '>=', $start_date)
      ->where('session_date', '<=', $end_date)
      ->first();

      return static::createBusinessClass($session_class_model);
   }

   public static function createBusinessClass(SessionClassModel $session_class_model)
   {
      if ($session_class_model == null)
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
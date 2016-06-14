<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

class AcademicPlanController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->academic_plan_persistence = $dao->getAcademicPlanDAO();
      $this->eap_persistence = $dao->getSchoolDAO();
   }

   public function index($eap)
   {
      $eap = $this->eap_persistence->createBusinessClass($eap);
      $academic_plans = $this->academic_plan_persistence->getBySchoolId($eap->getId());

      $data = [
         'academic_plans' => $academic_plans,
         'eap' => $eap,
      ];

      return view('backend.eaps.academic_plans.index', $data);
   }
}

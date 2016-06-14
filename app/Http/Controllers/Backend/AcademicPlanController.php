<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Http\Requests\Backend\AcademicPlan\StoreRequest;

use FisiLog\BusinessClasses\AcademicPlan;

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

   public function create($eap)
   {
      $eap = $this->eap_persistence->createBusinessClass($eap);

      $data = [
         'eap' => $eap,
      ];

      return view('backend.eaps.academic_plans.new', $data);
   }

   public function store($eap, StoreRequest $request)
   {
      extract($request->all());
      $eap = $this->eap_persistence->createBusinessClass($eap);
      $is_active = isset($is_active);

      $academic_plan = new AcademicPlan($name, $eap, $year_of_publication, $is_active);

      $this->academic_plan_persistence->save($academic_plan);

      return redirect()->route('eaps.academic_plans.index', ['eap' => $eap->getId()])->with('message', 'Plan Académico registrado exitosamente');
   }
}

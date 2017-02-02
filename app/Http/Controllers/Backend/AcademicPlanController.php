<?php

namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Http\Requests\Backend\AcademicPlan\StoreRequest;

use FisiLog\Models\AcademicPlan;
use FisiLog\Models\School;

class AcademicPlanController extends Controller
{
    public function index($eap_id)
    {
        $eap = School::with('academic_plans')->find($eap_id);

        return view('backend.eaps.academic_plans.index', compact('eap'));
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

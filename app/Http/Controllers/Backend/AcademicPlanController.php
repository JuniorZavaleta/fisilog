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

    public function create($eap_id)
    {
        $eap = School::find($eap_id);

        return view('backend.eaps.academic_plans.new', compact('eap'));
    }

    public function store($eap_id, StoreRequest $request)
    {
        $academic_plan = new AcademicPlan;
        $academic_plan->school_id           = $eap_id;
        $academic_plan->name                = $request->get('name');
        $academic_plan->year_of_publication = $request->get('year_of_publication');
        $academic_plan->is_active           = $request->get('is_active') == 'on';
        $academic_plan->save();

        return redirect()->route('eaps.academic_plans.index', ['eap_id' => $eap_id])->with('message', 'Plan Académico registrado exitosamente');
    }
}

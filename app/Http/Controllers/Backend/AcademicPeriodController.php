<?php

namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\Facultad;
use FisiLog\Models\AcademicPeriod;

use FisiLog\Http\Requests\Backend\AcademicPeriod\StoreRequest;

class AcademicPeriodController extends Controller
{
    public function index($facultad_id)
    {
        $facultad         = Facultad::find($facultad_id);
        $academic_periods = AcademicPeriod::where('facultad_id', $facultad_id)->get();

        return view('backend.facultades.academic_periods.index',
            compact('facultad', 'academic_periods'));
    }

    public function create($facultad_id)
    {
        $facultad = Facultad::find($facultad_id);

        return view('backend.facultades.academic_periods.new', compact('facultad'));
    }

    public function store($facultad_id, StoreRequest $request)
    {
        $academic_period = new AcademicPeriod;
        $academic_period->facultad_id = $facultad_id;
        $academic_period->name        = $request->get('name');
        $academic_period->start_date  = $request->get('start_date');
        $academic_period->end_date    = $request->get('end_date');
        $academic_period->save();

        return redirect()->route('facultades.academic_periods', ['facultad_id' => $facultad_id])
            ->with('message', 'Periodo Academico registrado exitosamente');
   }
}

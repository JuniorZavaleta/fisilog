<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests\Backend\AcademicPeriod\StoreRequest;
use FisiLog\Http\Controllers\Controller;
use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\BusinessClasses\AcademicPeriod;

class AcademicPeriodController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->academic_period_persistence = $dao->getAcademicPeriodDAO();
      $this->facultad_persistence = $dao->getFacultadDAO();
   }

   public function index($facultad)
   {
      $facultad = $this->facultad_persistence->createBusinessClass($facultad);
      $academic_periods = $this->academic_period_persistence->getByFacultyId($facultad->getId());

      $data = [
         'academic_periods' => $academic_periods,
         'facultad' => $facultad,
      ];

      return view('backend.facultades.academic_periods.index', $data);
   }

   public function create($facultad)
   {
      $facultad = $this->facultad_persistence->createBusinessClass($facultad);

      $data = [
         'facultad' => $facultad,
      ];

      return view('backend.facultades.academic_periods.new', $data);
   }

   public function store($facultad, StoreRequest $request)
   {
      extract($request->all());
      $facultad = $this->facultad_persistence->createBusinessClass($facultad);

      $academic_period = new AcademicPeriod($facultad, $name, $start_date, $end_date);

      $this->academic_period_persistence->save($academic_period);

      return redirect()->route('facultades.academic_periods.index', ['facultad' => $facultad->getId()])->with('message', 'Periodo Academico registrado exitosamente');
   }
}

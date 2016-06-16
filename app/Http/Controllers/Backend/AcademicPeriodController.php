<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;
use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\BusinessClass\AcademiPeriod;

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

      return view('backend.eaps.academic_periods.index', $data);
   }
}

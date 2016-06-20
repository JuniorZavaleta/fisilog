<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Models\Clase;
use FisiLog\Models\AcademicCycle;

class ClassController extends Controller
{

   public function __construct(DaoEloquentFactory $dao)
   {
      $this->school_persistence = $dao->getSchoolDAO();
      $this->facultad_persistence = $dao->getFacultadDAO();
   }

   public function search(Request $request)
   {
      extract($request->all());

      $facultades = $this->facultad_persistence->getAll();

      if ($course) {

         $today = date('Y-m-d');
         $academic_cycle = AcademicCycle::where('start_date', '<=', $today)
         ->where('end_date', '>=', $today)
         ->where('facultad_id', '=', 20)
         ->first();
         $academic_cycle_id = $academic_cycle->id;

         $clases = Clase::whereHas('group', function($group) use($course, $academic_cycle_id)
         {
            $group->whereHas('courseOpened', function($course_opened) use($course, $academic_cycle_id)
            {
               $course_opened->where('course_id', '=', $course)
               ->where('academic_cycle_id', '=', $academic_cycle_id);
            });
         })
         ->get()->toArray();

         //dd($clases);
      }

      $data = [
         'facultades' => $facultades,
         //'clases' => $clases,
      ];

      return view('backend.classes.search', $data);
   }

}

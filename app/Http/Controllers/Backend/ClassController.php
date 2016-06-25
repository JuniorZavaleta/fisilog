<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Models\AcademicCycle;

class ClassController extends Controller
{

   public function __construct(DaoEloquentFactory $dao)
   {
      $this->school_persistence = $dao->getSchoolDAO();
      $this->facultad_persistence = $dao->getFacultadDAO();
      $this->class_persistence = $dao->getClaseDAO();
      $this->session_class_persistence = $dao->getSessionClassDAO();
   }

   public function index()
   {
      $facultades = $this->facultad_persistence->getAll();

      $data = [
         'facultades' => $facultades,
      ];

      return view('backend.classes.search', $data);
   }

   public function search($course)
   {
      $today = date('Y-m-d');
      $academic_cycle = AcademicCycle::where('start_date', '<=', $today)
      ->where('end_date', '>=', $today)
      ->where('facultad_id', '=', 20)
      ->first();

      $academic_cycle_id = $academic_cycle->id;

      $classes = $this->class_persistence->getByCourseId($course, $academic_cycle_id);

      $rows = [];

      foreach ($classes as $class) {
         $clase_id = $class->getId();
         $session_class = $this->session_class_persistence->findSessionClassToNextWeek($clase_id);

         $rows[] = [
            'id' => $clase_id,
            'group_number' => $class->getGroupNumber(),
            'professor_name' => $class->getProfessorFullName(),
            'day_of_the_week' => $class->getDayOfTheWeek(),
            'schedule' => $class->getSchedule(),
            'class_type' => $class->getClassType(),
            'classroom' => $class->getClassRoomName(),
            'status' => $session_class->getStatus(),
            'deadline' => $session_class->getDeadlineMessage(),
         ];
      }

      return response()->json($rows);
   }

}

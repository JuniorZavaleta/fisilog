<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\AcademicCycle;
use FisiLog\Models\Clase;
use FisiLog\Models\Attendance;

use Auth;

class ClassController extends Controller
{
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
      $academic_cycle = $this->academic_period_persistence->getPresentPeriodByFacultyId(20);

      $academic_cycle_id = $academic_cycle->id;

      $classes = $this->class_persistence->getByCourseId($course, $academic_cycle_id);

      $rows = [];

      foreach ($classes as $class) {
         $clase_id = $class->getId();
         $session_class = $this->session_class_persistence->findNextSessionClass($clase_id);

         $rows[] = [
            'id' => $clase_id,
            'group_number' => $class->getGroupNumber(),
            'professor_name' => $class->getProfessorFullName(),
            'day_of_the_week' => $class->getDayOfTheWeek(),
            'schedule' => $class->getSchedule(),
            'class_type' => $class->getClassType(),
            'classroom' => $class->getClassRoomName(),
            'status' => ($session_class != null) ? $session_class->getStatus() : 'No hay sesion de clase',
            'deadline' => ($session_class != null) ? $session_class->getDeadlineMessage() : 'No hay sesion de clase',
            'session_id' => ($session_class != null) ? $session_class->getId() : -1,
         ];
      }

      return response()->json($rows);
   }

    public function show($clase_id)
    {
        $clase = Clase::find($clase_id);

        return view('backend.classes.show', compact('clase'));
    }

}

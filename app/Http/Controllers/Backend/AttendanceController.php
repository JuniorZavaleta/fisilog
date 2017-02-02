<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use Auth;

use FisiLog\Models\Clase;
use FisiLog\Models\Attendance;

use FisiLog\Http\Requests\Backend\Student\GetByDocument;

class AttendanceController extends Controller
{
    public function index($clase_id)
    {
        $user  = Auth::user();
        $clase = Clase::with('course')->find($clase_id);

        $attendances = Attendance::where('user_id', '=', $user->id)
            ->whereHas('session_class', function ($session_class) use ($clase_id) {
                $session_class->where('class_id', '=', $clase_id);
            })->get();

        return view('backend.classes.attendances.index', compact('attendances', 'clase'));
    }

   public function storeStudent($clase, $session_class, GetByDocument $request)
   {
      extract($request->all());

      $user = $this->user_persistence->findByDocument($document_code, $document_type);
      $clase = $this->clase_persistence->createBusinessClass($clase);

      $attendance = AttendanceModel::where('user_id', '=', $user->getId())
      ->where('session_class_id', '=', $session_class->id)
      ->first();

      if (!$attendance->verified) {
         $attendance->verified = true;
         $attendance->save();
      }

      $data = [
         'full_name' => $user->getFullName(),
         'course_name' => $clase->getCourseName(),
      ];

      $user->notify('attendance', $data, 'Asistencia a clases');

      return response()->json(['message' => 'OK']);
   }

   public function storeProfessor($clase)
   {
      $user_model = Auth::user();
      $user = $this->user_persistence->createBusinessClass($user_model);

      $clase_id = $clase->id;
      $session_class = $this->session_class_persistence->findNextSessionClass($clase_id);

      $verify_schedule = Attendance::verifyDateAndAttendanceDate($clase);

      if ($verify_schedule) {
         $session_class_id = $session_class->getId();
         $user_id = $user->getId();
         $has_attendance = $this->attendance_persistence->verifyAttendance($user_id, $session_class_id);

         if ($has_attendance == false) {
            $attendance = new Attendance($user, $session_class, 0);

            $this->attendance_persistence->save($attendance);

            $attendances = Clase::find($clase_id)->attendances;

            return redirect()-> route('classes.sessions_class.index', ['clase' => $clase_id, 'session_class' => $session_class_id]);
         } else {
            return redirect()->route('index')->with('error', 'asistencia ya marcada');
         }
      }

      return redirect()->route('index')->with('error', 'fuera de horario');
   }
}

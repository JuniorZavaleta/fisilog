<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use Auth;

use FisiLog\Models\Clase;
use FisiLog\Models\Attendance;
use FisiLog\Models\SessionClass;

use Carbon\Carbon;

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

    private function validateSchedule($clase)
    {
        $current_time = Carbon::now();

        return ($current_time->dayOfWeek == $clase->day) &&
            ($clase->start_hour <= $current_time->toTimeString()) &&
            ($clase->end_hour   >= $current_time->toTimeString());
    }

    public function storeProfessor($clase_id)
    {
        $user  = Auth::user();
        $clase = Clase::find($clase_id);
        $session_class = SessionClass::where('session_date', '>=', Carbon::yesterday())
            ->where('session_date', '<=', Carbon::today()->addWeek())
            ->where('class_id', '=', $clase_id)
            ->first();

        if ($this->validateSchedule($clase) && !is_null($session_class)) {
            $last_attendance = Attendance::where('user_id','=',$user->id)
                ->where('session_class_id','=',$session_class->id)
                ->first();

            if (is_null($last_attendance) || ($last_attendance->verified == false)) {
                $attendance = new Attendance;
                $attendance->user_id = $user->id;
                $attendance->session_class_id = $session_class->id;
                $attendance->verified = false;
                $attendance->save();
            }

            return redirect()->route('sessions_class.index', ['clase_id' => $clase_id, 'session_class' => $session_class->id]);
        }

        return redirect()->route('index')->with('error', 'fuera de horario');
    }
}

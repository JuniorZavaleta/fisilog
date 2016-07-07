<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\Clase;

use FisiLog\Dao\DaoEloquentFactory;

use Auth;

use FisiLog\Models\Attendance;

use FisiLog\Http\Requests\Backend\Student\GetByDocument;

class AttendanceController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->attendance_persistence = $dao->getAttendanceDAO();
      $this->user_persistence = $dao->getUserDAO();
      $this->clase_persistence = $dao->getClaseDAO();
   }

   public function index($clase)
   {
      $user = Auth::user();
      $clase_id = $clase->id;

      $attendances = Clase::find($clase_id)->attendances;

      $data = [
         'attendances' => $attendances,
      ];

      return view('backend.classes.attendances.index', $data);
   }


   public function storeStudent($clase, $session_class, GetByDocument $request)
   {
      extract($request->all());

      $user = $this->user_persistence->findByDocument($document_code, $document_type);
      $clase = $this->clase_persistence->createBusinessClass($clase);

      $attendance = Attendance::where('user_id', '=', $user->getId())
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
}

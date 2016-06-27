<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\Clase;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\BusinessClasses\Attendance;

use Auth;

class AttendanceController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->attendance_persistence = $dao->getAttendanceDAO();
      $this->class_session_persistence = $dao->getSessionClassDAO();
      $this->user_persistence = $dao->getUserDAO();
   }

   public function index($clase)
   {
      $user = Auth::user();
      $clase_id = $clase->id;

      $attendances = $this->attendance_persistence->getByUser($user, $clase);

      $data = [
         'attendances' => $attendances,
      ];

      return view('backend.classes.attendances.index', $data);
   }

   public function saveAttendance($clase)
   {
      $user_model = Auth::user();
      $user = $this->user_persistence->createBusinessClass($user_model);

      $clase_id = $clase->id;
      $start_hour = $clase->start_hour;
      $end_hour = $clase->end_hour;
      $current_hour = date('H:i:s');

      $session_class = $this->class_session_persistence->findNextSessionClass($clase_id);

      if ($start_hour <= $current_hour && $end_hour >= $current_hour) {
         $attendance = new Attendance($user, $session_class, 1);

         $this->attendance_persistence->save($attendance);

         $attendances = Clase::find($clase_id)->attendances;

         return redirect()-> route('classes.attendances.index', ['class' => $clase_id]);
      }

      return redirect()->route('index');

   }
}

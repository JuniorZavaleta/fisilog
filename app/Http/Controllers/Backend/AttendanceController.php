<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\Attendance;

use FisiLog\Dao\DaoEloquentFactory;

use Auth;

class AttendanceController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->attendance_persistence = $dao->getAttendanceDAO();
   }

   public function index($clase)
   {
      $user = Auth::user();
      $clase_id = $clase->id;

      $attendances = Attendance::where('user_id','=', $user->id)
      ->whereHas('session_class', function($session_class) use ($clase_id)
      {
         $session_class->where('class_id', '=', $clase_id);
      })
      ->with('session_class')
      ->get();

      $data = [
         'attendances' => $attendances,
      ];

      return view('backend.classes.attendances.index', $data);
   }
}

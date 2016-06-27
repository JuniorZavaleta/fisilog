<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\Clase;

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

      $attendances = Clase::find($clase_id)->attendances;

      $data = [
         'attendances' => $attendances,
      ];

      return view('backend.classes.attendances.index', $data);
   }
}

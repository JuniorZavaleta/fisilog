<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use Auth;

class IndexController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->class_persistence = $dao->getClaseDAO();
   }

   public function index()
   {
      $user = Auth::user();

      if ($user->user_type_id == 1) {
         $classes = $this->class_persistence->getByStudentId($user->id);

         $view = 'backend.index.students';
         $data = [
            'classes' => $classes,
         ];
      } elseif ($user->user_type_id == 2) {

         $classes = $this->class_persistence->getByProfessorId($user->id);

         $view = 'backend.index.professors';
         $data = [
            'classes' => $classes,
         ];
      } elseif ($user->user_type_id == 3) {

         $current_date = date('Y-m-d');
         $classes = $this->class_persistence->getByVerifyAttendance($current_date);
         $view = 'backend.index.workers';
         $data = [
            'classes' => $classes,
         ];
      } else {

         //return view('');
      }

      return view($view, $data);
   }
}

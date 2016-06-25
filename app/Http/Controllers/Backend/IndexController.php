<?php
namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
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

         $data = [
            'classes' => $classes,
         ];

         return view('backend.index.students', $data);
      }
      elseif ($user->user_type_id == 2) {

         return view('users.complete');
      }
      else {

         //return view('');
      }
   }
}

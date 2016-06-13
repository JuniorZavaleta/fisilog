<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

class EapController extends Controller
{

   public function __construct(DaoEloquentFactory $dao)
   {
      $this->school_persistence = $dao->getSchoolDAO();
   }

   public function index()
   {
      $schools = $this->school_persistence->getAll();

      $data = [
         'eaps' => $schools,
      ];

      return view('backend.eaps.index', $data);
   }
}

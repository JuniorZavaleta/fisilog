<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

class FacultadController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->facultad_persistence = $dao->getFacultadDAO();
   }

   public function index()
   {
      $facultades = $this->facultad_persistence->getAll();

      $data = [
         'facultades' => $facultades,
      ];

      return view('backend.facultades.index', $data);
   }
}

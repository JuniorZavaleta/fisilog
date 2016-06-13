<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Http\Requests\Backend\Eap\StoreRequest;

use FisiLog\BusinessClasses\School;

use FisiLog\DAO\Facultad\FacultadDaoEloquent;

class EapController extends Controller
{

   public function __construct(DaoEloquentFactory $dao)
   {
      $this->school_persistence = $dao->getSchoolDAO();
      $this->facultad_persistence = $dao->getFacultadDAO();
   }

   public function index()
   {
      $schools = $this->school_persistence->getAll();

      $data = [
         'eaps' => $schools,
      ];

      return view('backend.eaps.index', $data);
   }

   public function create()
   {
      $facultades = $this->facultad_persistence->getAll();

      $data = [
         'facultades' => $facultades,
      ];

      return view('backend.eaps.new', $data);
   }

   public function store(StoreRequest $request)
   {
      extract($request->all());

      $facultad = $this->facultad_persistence->findById($facultad_id);

      $eap = new School($name, $code, $facultad);

      $this->school_persistence->save($eap);

      return redirect()->route('eaps.index')->with('message', 'EAP registrada existosamente.');
   }

}

<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\DAO\DaoEloquentFactory;

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

   public function edit($eap)
   {
      $eap = $this->school_persistence->createBusinessClass($eap);
      $facultades = $this->facultad_persistence->getAll();

      $data = [
         'eap' => $eap,
         'facultades' => $facultades,
      ];

      return view('backend.eaps.edit', $data);
   }

   public function update($eap, StoreRequest $request)
   {
      extract($request->all());

      $eap = $this->school_persistence->createBusinessClass($eap);
      $facultad = $this->facultad_persistence->findById($facultad_id);

      $eap->setName($name);
      $eap->setCode($code);
      $eap->setFacultad($facultad);

      $this->school_persistence->update($eap);

      return redirect()->route('eaps.index')->with('message', 'EAP actualizada exitosamente.');
   }

   public function getByFacultad($facultad)
   {
      $facultad = $this->facultad_persistence->createBusinessClass($facultad);
      $eaps = $this->school_persistence->getByFacultadId($facultad->getId());

      $output = [];

      foreach ($eaps as $eap) {
         $output[] = [
            'id' => $eap->getId(),
            'name' => $eap->getName(),
         ];
      }

      return response()->json($output);
   }

}

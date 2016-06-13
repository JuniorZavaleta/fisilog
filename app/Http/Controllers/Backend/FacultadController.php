<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Http\Requests\Backend\Facultad\StoreRequest;

use FisiLog\BusinessClasses\Facultad;

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

   public function create()
   {
      return view('backend.facultades.new');
   }

   public function store(StoreRequest $request)
   {
      extract($request->all());

      $facultad = new Facultad($name, $code);

      $this->facultad_persistence->save($facultad);

      return redirect()->route('facultades.index')->with('message', 'Facultad registrada exitosamente.');
   }

   public function edit($facultad)
   {
      $facultad = $this->facultad_persistence->createBusinessClass($facultad);

      $data = [
         'facultad' => $facultad,
      ];

      return view('backend.facultades.edit', $data);
   }

   public function update($facultad, StoreRequest $request)
   {
      extract($request->all());

      $facultad = $this->facultad_persistence->createBusinessClass($facultad);

      $facultad->setName($name);
      $facultad->setCode($code);

      $this->facultad_persistence->update($facultad);

      return redirect()->route('facultades.index')->with('message', 'Facultad actualizada exitosamente.');
   }

}

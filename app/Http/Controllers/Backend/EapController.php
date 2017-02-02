<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Http\Requests\Backend\Eap\StoreRequest;

use FisiLog\Models\School;
use FisiLog\Models\Facultad;

class EapController extends Controller
{
    public function index()
    {
        $eaps = School::all();

        return view('backend.eaps.index', compact('eaps'));
    }

    public function create()
    {
        $facultades = Facultad::all();

        return view('backend.eaps.new', compact('facultades'));
    }

    public function store(StoreRequest $request)
    {
        $eap = new School;
        $eap->name        = $request->get('name');
        $eap->code        = $request->get('code');
        $eap->facultad_id = $request->get('facultad_id');
        $eap->save();

        return redirect()->route('eaps.index')->with('message', 'EAP registrada existosamente.');
    }

    public function edit($id)
    {
        $eap        = School::find($id);
        $facultades = Facultad::all();

        return view('backend.eaps.edit', compact('eap', 'facultades'));
    }

    public function update($id, StoreRequest $request)
    {
        $eap = School::find($id);
        $eap->name        = $request->get('name');
        $eap->code        = $request->get('code');
        $eap->facultad_id = $request->get('facultad_id');
        $eap->save();

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

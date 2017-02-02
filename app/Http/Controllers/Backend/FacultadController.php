<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Http\Requests\Backend\Facultad\StoreRequest;

use FisiLog\Models\Facultad;

class FacultadController extends Controller
{
    public function index()
    {
        $facultades = Facultad::all();

        return view('backend.facultades.index', compact('facultades'));
    }

    public function create()
    {
        return view('backend.facultades.new');
    }

    public function store(StoreRequest $request)
    {
        $facultad = new Facultad;
        $facultad->name = $request->get('name');
        $facultad->code = $request->get('code');
        $facultad->save();

        return redirect()->route('facultades.index')->with('message', 'Facultad registrada exitosamente.');
    }

    public function edit($id)
    {
        $facultad = Facultad::find($id);

        return view('backend.facultades.edit', compact('facultad'));
    }

    public function update($id, StoreRequest $request)
    {
        $facultad = Facultad::find($id);
        $facultad->name = $request->get('name');
        $facultad->code = $request->get('code');
        $facultad->save();

        return redirect()->route('facultades.index')->with('message', 'Facultad actualizada exitosamente.');
    }
}

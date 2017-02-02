<?php

namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\Facultad;

class ClassRoomController extends Controller
{
   public function index($facultad_id)
   {
        $facultad = Facultad::with('classrooms')->find($facultad_id);

        return view('backend.facultades.classrooms.index', compact('facultad'));
    }
}

<?php

namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

class ClassRoomController extends Controller
{
   public function index($facultad)
   {
        $facultad = $this->facultad_persistence->createBusinessClass($facultad);
        $classrooms = $this->classroom_persistence->getByFacultadId($facultad->getId());

        $data = [
            'facultad' => $facultad,
            'classrooms' => $classrooms,
        ];

        return view('backend.facultades.classrooms.index', $data);
    }
}

<?php

namespace FisiLog\Http\Controllers;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;
use FisiLog\Services\AttendanceRegisterService;
use FisiLog\Services\ClasePersistenceService;
use FisiLog\Services\DocumentTypePersistenceService;

class AttendanceController extends Controller
{
    public function __construct(
        AttendanceRegisterService $attendance_service,
        DocumentTypePersistenceService $document_type_persistence_service,
        ClasePersistenceService $clase_persistence_service
    ) {
        $this->attendance_service = $attendance_service;
        $this->clase_persistence_service = $clase_persistence_service;
        $this->document_type_persistence_service = $document_type_persistence_service;
    }

    public function index()
    {
        $id = 2;
        $classes = $this->clase_persistence_service->getByProfessor($id);

        $data = [
            'classes' => $classes,
        ];

        return view('attendance.index', $data);
    }

    public function getStudent($clase_id) 
    {
        $clase = $this->clase_persistence_service->findById($clase_id);
        $document_types = $this->document_type_persistence_service->all();

        $data = [
            'class' => $clase,
            'document_types' => $document_types,
        ];

        return view('attendance.student', $data);
    }

    public function findStudent(Request $request) {
        $input = $this->makeInputFind($request);
        $user = $this->attendance_service->preRegisterStudent($input);

        return response()->json($user);
    }

    public function postStudent(Request $request, $clase_id) {
        $input = $this->makeInput($request);
    }

    private function makeInputFind(Request $request) {
        return [
            'document_type' => $request->input('document_type'),
            'document_code' => $request->input('document_code'),
        ];
    }

    private function makeRules() {
        return [
            'document_type' => 'required|exists:document_types,id',
            'document_code' => 'required',
        ];
    }
}

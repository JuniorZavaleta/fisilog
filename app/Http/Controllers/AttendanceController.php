<?php

namespace FisiLog\Http\Controllers;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;
use FisiLog\Services\AttendanceRegisterService;
use FisiLog\Services\ClasePersistenceService;
use FisiLog\Services\DocumentTypePersistenceService;
use FisiLog\Services\NotificationService;
use Validator;
use Auth;

class AttendanceController extends Controller
{
    public function __construct(
        AttendanceRegisterService $attendance_service,
        DocumentTypePersistenceService $document_type_persistence_service,
        ClasePersistenceService $clase_persistence_service,
        NotificationService $notification_service
    ) {
        $this->attendance_service = $attendance_service;
        $this->clase_persistence_service = $clase_persistence_service;
        $this->document_type_persistence_service = $document_type_persistence_service;
        $this->notification_service = $notification_service;
        $this->user = Auth::user();
    }

    public function index()
    {
        if ($this->user)
            $classes = $this->clase_persistence_service->getByProfessor($this->user->id);
        else
            $classes = null;

        $data = [
            'classes' => $classes,
        ];

        return view('attendance.index', $data);
    }

    public function getStudent($clase_id) 
    {
        $clase = $this->clase_persistence_service->findById($clase_id);
        $document_types = $this->document_type_persistence_service->all();

        if ($this->user && $this->user->type == "Profesor") {
            $data = [
                'user_id' => $this->user->id,
                'clase_id' => $clase_id,
            ];
            $attendance = $this->attendance_service->registerProfessor( $data );
            if ($attendance != null) {
                $attendance->setVerified(true);
                $this->notification_service->startClase( $data );
            }
        }


        $data = [
            'class' => $clase,
            'document_types' => $document_types,
        ];

        return view('attendance.student', $data);
    }

    public function findStudent(Request $request) {
        $input = $this->makeInput($request);
        $rules = $this->makeRules();

        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $output = [
                'error' => 'Datos inválidos',
            ];

            return response()->json($output, 404);
        }

        $user = $this->attendance_service->preRegisterStudent($input);

        if ($user == null) {
            $output = [
                'error' => 'Este alumno no pertence a la clase',
            ];

            return response()->json($output, 404);
        }

        $output = [
            'name' => $user->getName(),
            'lastname' => $user->getLastname(),
            'photo_url' => $user->getPhotoUrl(),
        ];
        return response()->json($output);
    }

    public function postStudent(Request $request, $clase_id) {
        $input = $this->makeInputPost($request, $clase_id);
        $rules = $this->makeRules();

        $validator = Validator::make($input, $rules);

        if($validator->fails()) {
            $output = [
                'error' => 'Datos inválidos',
            ];

            return response()->json($output, 404);
        }

        $attendance = $this->attendance_service->registerStudent($input);

        if ($attendance == null || $attendance->getUser() == null) {
            $output = [
                'error' => 'Este alumno no pertence a la clase',
            ];

            return response()->json($output, 404);
        }

        $output = [
            'name' => $attendance->getUser()->getName(),
            'lastname' => $attendance->getUser()->getLastname(),
            'photo_url' => $attendance->getUser()->getPhotoUrl(),
        ];
        return response()->json($output);
    }

    private function makeInput(Request $request) {
        return [
            'document_type' => $request->input('document_type'),
            'document_code' => $request->input('document_code'),
        ];
    }

    private function makeInputPost(Request $request, $clase_id) {
        return [
            'document_type' => $request->input('document_type'),
            'document_code' => $request->input('document_code'),
            'clase_id' => $clase_id,
        ];
    }

    private function makeRules() {
        return [
            'document_type' => 'required|exists:document_types,id',
            'document_code' => 'required|exists:documents,code',
        ];
    }
}

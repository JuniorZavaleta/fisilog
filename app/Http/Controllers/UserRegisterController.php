<?php

namespace FisiLog\Http\Controllers;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;
use FisiLog\Models\DocumentType;
use FisiLog\Models\School;
use FisiLog\Models\AcademicDepartment;
use FisiLog\Services\UserRegisterService;
use FisiLog\BusinessClasses\User;
use Validator;

class UserRegisterController extends Controller
{
    private $service;

    public function __construct(UserRegisterService $user_service) {
        $this->user_service = $user_service;
    }

    public function index() {
        $document_types = DocumentType::all();
        $schools = School::all();
        $academic_departments = AcademicDepartment::all();

        $data = [
            'document_types' => $document_types,
            'schools' => $schools,
        ];

        return view('users.register', $data);
    }

    public function process(Request $request) {
        $input = $this->makeInput($request);
        $rules = $this->makeRules();
        $validator = Validator::make($input, $rules);
        $this->specialRules($validator, $input);

        if($validator->fails())
            return redirect()->route('user.register.index')->withErrors($validator->errors())->withInput();

        $this->user_service->registerUser($input);

        return view('users.complete');
    }

    private function makeInput(Request $request) {
        return [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'document_type' => $request->input('document_type'),
            'document_code' => $request->input('document_id'),
            'phone' => $request->input('phone'),
            'phone_length' => strlen($request->input('phone')),
            'user_type' => $request->input('user_type'),
            'school_id' => $request->input('school_id'),
            'academic_department_id' => $request->input('academic_department_id'),
            'school_code' => $request->input('school_code'),
            'year_of_entry' => $request->input('year_of_entry'),
            'professor_type' => $request->input('professor_type'),
        ];
    }
    private function makeRules() {
        return [
            'name' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email',
            'document_type' => 'required|exists:document_types,id',
            'document_code' => 'required',
            'phone' => 'required|numeric',
            'phone_length' => 'required|in:7,9',
            'user_type' => 'required|in:1,2',
        ];
    }
    private function specialRules($validator, $input) {
        $validator->sometimes('school_id', 'required|exists:schools,id', function($input) {
            return $this->isStudent($input);
        });
        $validator->sometimes('school_code', 'required|numeric', function($input) {
            return $this->isStudent($input);
        });
        $validator->sometimes('year_of_entry', 'required|numeric|digits:4', function($input) {
            return $this->isStudent($input);
        });
        $validator->sometimes('academic_department_id','required|academic_departments,id',function($input) {
            return $this->isProfessor($input);
        });
        $validator->sometimes('professor_type', 'required|in:'.$this->getProfessorTypes(), function($input) {
            return $this->isProfessor($input);
        });
    }
    private function isStudent($input) {
        return $input['user_type'] == 1;
    }
    private function isProfessor($input) {
        return $input['user_type'] == 2;
    }
    private function getProfessorTypes() {
        $types = config('enums.professor_types');
        return implode(',', array_keys($types));
    }
}

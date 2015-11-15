<?php

namespace FisiLog\Http\Controllers;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;
use FisiLog\Models\DocumentType;
use FisiLog\Services\UserRegisterService;
use Validator;

class UserRegisterController extends Controller
{
    private $service;

    public function __construct(UserRegisterService $service) {
        $this->service = $service;
    }

    public function index() {
        $document_types = DocumentType::all();
        $data = [
            'document_types' => $document_types,
        ];

        return view('users.register', $data);
    }

    public function process(Request $request) {
        $input = $this->makeInput($request);
        $rules = $this->makeRules();
        $validator = Validator::make($input, $rules);
        if($validator->fails())
            return redirect()->route('user.register.index')->withErrors($validator->errors)->withInput();

        $this->service->registerUser($input);

        return view('users.complete');
    }

    private function makeInput(Request $request) {
        return [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'document_type' => $request->input('document_type'),
        ];
    }
    private function makeRules() {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'email',
            //'document_type' => '',
        ];
    }
}

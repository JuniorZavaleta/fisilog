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

    public function __construct(UserRegisterService $user_service) {
        $this->user_service = $user_service;
        /*$this->document_service = $document_service;*/
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
            return redirect()->route('user.register.index')->withErrors($validator->errors())->withInput();

        $this->user_service->registerUser($input);
        //$this->document_service->registerDocument($user, $document);
        return view('users.complete');
    }

    private function makeInput(Request $request) {
        return [
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'document_type' => $request->input('document_type'),
            'document_id' => $request->input('document_id'),
            'phone' => $request->input('phone'),
            'phone_length' => strlen($request->input('phone')),
        ];
    }
    private function makeRules() {
        return [
            'name' => 'required|alpha',
            'lastname' => 'required|alpha',
            'email' => 'required|email',
            'document_type' => 'required|exists:document_types,id',
            'document_id' => 'required',
            'phone' => 'required|numeric',
            'phone_length' => 'required|in:7,9',
        ];
    }
}

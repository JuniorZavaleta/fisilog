<?php

namespace FisiLog\Http\Controllers;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;
use FisiLog\Models\DocumentType;
use FisiLog\Models\User;
use FisiLog\Services\DocumentRegisterService;
use Validator;

class DocumentController extends Controller
{
    private $service;

    public function __construct(DocumentRegisterService $document_service) {
    	$this->document_service = $document_service;
    }

    public function index($id) {
    	$document_types = DocumentType::all();
    	$user = User::find($id);
    	$data = [
    		'document_types' => $document_types,
    		'user'        => $user
    	];

    	return view('document.register', $data);
    }

    public function process(Request $request) {
        $input = $this->makeInput($request);
      	$rules = $this->makeRules();
      	$validator = Validator::make($input, $rules);
      	if($validator->fails())
          return redirect()->back()->withErrors($validator->errors())->withInput();
      	$this->document_service->registerDocument($input);

      	return view('users.complete');
    }

    private function makeRules() {
      return [
          'document_type' => 'required|exists:document_types,id',
          'document_code' => 'required',
      ];
    }

    private function makeInput($request) {
      return [
          'document_type' => $request->input('document_type'),
          'document_code' => $request->input('document_id'),
          'user_id'          => $request->route('id')
      ];
    }
}
<?php

namespace FisiLog\Http\Controllers;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;
use FisiLog\Models\DocumentType;


class UserRegisterController extends Controller
{
    public function index() {
        $document_types = DocumentType::all();
        $data = [
            'document_types' => $document_types,
        ];

        return view('users.register', $data);
    }

    public function process() {

    }
}

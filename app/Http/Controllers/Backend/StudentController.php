<?php

namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Http\Requests\Backend\Student\GetByDocument;

use FisiLog\Models\User;

class StudentController extends Controller
{
    public function getByDocument(GetByDocument $request)
    {
        $document_code = $request->get('document_code');
        $document_type = $request->get('document_type');

        $user = User::findByDocument($document_type, $document_code)->first();

        if (is_null($user)) {
            return response()->json(['error' => 'user'], 422);
        }

        return response()->json(['user' => $user]);
    }
}

<?php

namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Http\Requests\Backend\Student\GetByDocument;

class StudentController extends Controller
{
    public function getByDocument(GetByDocument $request)
    {
        extract($request->all());

        $user = $this->user_persistence->findByDocument($document_code, $document_type);

        if (is_null($user)) {
            return response()->json(['error' => 'user'], 422);
        }

        return response()->json(['user' => $user->toArray()]);
    }
}

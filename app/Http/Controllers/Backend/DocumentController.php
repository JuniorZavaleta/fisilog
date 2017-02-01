<?php

namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\User;
use FisiLog\Models\Document;

class DocumentController extends Controller
{
    public function index($user_id)
    {
        $user      = User::find($user_id);
        $documents = Document::with('document_type')->where('user_id', $user->id)->get();

        return view('backend.users.documents.index', compact('user', 'documents'));
    }
}

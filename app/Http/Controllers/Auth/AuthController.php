<?php

namespace FisiLog\Http\Controllers\Auth;

use FisiLog\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Auth;
use FisiLog\Models\User;
use FisiLog\Models\DocumentType;

use FisiLog\Http\Requests\Auth\AuthenticationDocument;
use FisiLog\Http\Requests\Auth\AuthenticationEmail;

class AuthController extends Controller
{
    use ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function getLogin()
    {
        $document_types = DocumentType::all();

        $data = [
            'document_types' => $document_types,
        ];

        return view('auth.login', $data);
    }

    protected function postLogin(AuthenticationEmail $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt([ 'email' => $email, 'password' => $password ])) {
            return redirect()->intended('index');
        }

        return redirect()->route('auth.login');
    }

    public function authenticationDocument(AuthenticationDocument $request)
    {
        extract($request->all());

        $user = $this->user_persistence->findByDocument($document_id, $document_type);

        if ( $user && Auth::attempt(['email' => $user->getEmail(), 'password' => $password]) ) {
            return redirect()->intended('index');
        }

        return redirect('/login')->with('error_message', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}

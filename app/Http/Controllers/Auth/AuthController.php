<?php
namespace FisiLog\Http\Controllers\Auth;

use FisiLog\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use FisiLog\Services\DocumentTypePersistenceService;

use Auth;
use FisiLog\Models\User;

use FisiLog\Http\Requests\Auth\AuthenticationDocument;
use FisiLog\Http\Requests\Auth\AuthenticationEmail;

class AuthController extends Controller
{
    use ThrottlesLogins;

    public function __construct(DocumentTypePersistenceService $document_type_persistence_service)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->document_type_persistence_service = $document_type_persistence_service;
    }

   protected function getLogin() {
      $document_types = $this->document_type_persistence_service->all();

      $data = [
         'document_types' => $document_types,
      ];

      return view('auth.login', $data);
   }

   protected function postLogin(AuthenticationEmail $request) {
      $email = $request->input('email');
      $password = $request->input('password');

      if (Auth::attempt([ 'email' => $email, 'password' => $password ])) {
         return redirect()->intended('index');
      }

      return redirect()->route('auth.login');
   }

   public function authenticationDocument(AuthenticationDocument $request)
   {
      $document_type = $request->input('document_type');
      $document_id   = $request->input('document_id');
      $password      = $request->input('password');

      $user = User::whereHas('documents', function($query) use ($document_id, $document_type) {
         $query->where('code', $document_id)
               ->where('document_type_id', $document_type);
      })->first();

      if ( $user && Auth::attempt(['email' => $user->email, 'password' => $password]) ) {
         return redirect()->intended('index');
      }

      $error_message = 'Invalid credentials';

      return redirect('/login')->with('error_message', $error_message);
   }

    public function logout() {
        Auth::logout();

        return redirect()->route('auth.login');
    }
}

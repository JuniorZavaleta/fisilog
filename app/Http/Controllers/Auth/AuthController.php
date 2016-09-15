<?php
namespace FisiLog\Http\Controllers\Auth;

use FisiLog\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;

use Auth;
use FisiLog\Models\User;

use FisiLog\Http\Requests\Auth\AuthenticationDocument;
use FisiLog\Http\Requests\Auth\AuthenticationEmail;

use FisiLog\DAO\DaoEloquentFactory;

class AuthController extends Controller
{
   use ThrottlesLogins;

   public function __construct(DaoEloquentFactory $dao)
   {
      $this->middleware('guest', ['except' => 'logout']);
      $this->document_type_persistence = $dao->getDocumentTypeDAO();
      $this->user_persistence          = $dao->getUserDAO();
   }

   protected function getLogin()
   {
      $document_types = $this->document_type_persistence->getAll();

      $data = [
         'document_types' => $document_types,
      ];

      return view('auth.login', $data);
   }

   protected function postLogin(AuthenticationEmail $request)
   {
      $email = $request->input('email');
      $password = $request->input('password');

      if (Auth::attempt([ 'email' => $email, 'password' => $password ]))
         return redirect()->intended('index');

      return redirect()->route('auth.login');
   }

   public function authenticationDocument(AuthenticationDocument $request)
   {
      extract($request->all());

      $user = $this->user_persistence->findByDocument($document_id, $document_type);

      if ( $user && Auth::attempt(['email' => $user->getEmail(), 'password' => $password]) )
         return redirect()->intended('index');

      $error_message = 'Invalid credentials';

      return redirect('/login')->with('error_message', $error_message);
   }

   public function logout()
   {
      Auth::logout();

      return redirect()->route('auth.login');
   }
}

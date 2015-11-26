<?php

namespace FisiLog\Http\Controllers\Auth;

use FisiLog\Models\User;
use Validator;
use FisiLog\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use FisiLog\Services\DocumentService;
use FisiLog\Services\UserLoginService;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserLoginService $login_service, DocumentService $document_service)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->user_service = $login_service;
        $this->document_service = $document_service;

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function getLogin() {
        return view('users.login');
    }

    protected function postLogin(Request $request) {
        $data = $this->makeInput($request);
        if ($request->has('email')) {
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                // Authentication passed...
                return redirect()->intended('index');
            } 
        } else if ($request->has('document_id')) {
            $document = $this->document_service->findByCode($data['document_id']);
            if (!is_null($document)) {
                $user = $this->user_service->findByDocument($document);
                if (Auth::attempt(['email' => $user->getEmail(), 'password' => $data['password']])) {
                    // Authentication passed...
                    return redirect()->intended('index');
                }
            }
        }
        return redirect()->route('auth.login');
    }


    protected function makeInput($request) {
        $data = [];
        if ($request->has('email')) {
            $data['email'] = $request['email'];
            $data['password'] = $request['password'];

        } else if ($request->has('document_id')) {
            $data['document_type'] = $request['document_type'];
            $data['document_id']   = $request['document_id'];
            $data['password']      = $request['password'];
        }
        return $data;
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}

<?php

namespace FisiLog\Http\Requests\Auth;

use FisiLog\Http\Requests\Request;

class AuthenticationEmail extends Request
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'email'    => 'required|exists:users,email',
         'password' => 'required',
      ];
   }
}

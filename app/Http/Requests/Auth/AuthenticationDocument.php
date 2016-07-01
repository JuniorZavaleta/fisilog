<?php

namespace FisiLog\Http\Requests\Auth;

use FisiLog\Http\Requests\Request;

class AuthenticationDocument extends Request
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      return [
         'document_type' => 'required|exists:document_types,id',
         'document_id'   => 'required|exists:documents,code',
         'password'      => 'required',
      ];
   }
}

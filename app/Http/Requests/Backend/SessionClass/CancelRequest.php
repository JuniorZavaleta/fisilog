<?php

namespace FisiLog\Http\Requests\Backend\SessionClass;

use FisiLog\Http\Requests\Request;

class CancelRequest extends Request
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
      //return $this->user->user_type == 3;
      return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
      return [
         'password' => 'required',
      ];
   }
}

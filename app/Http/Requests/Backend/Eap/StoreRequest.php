<?php

namespace FisiLog\Http\Requests\Backend\Eap;

use FisiLog\Http\Requests\Request;

class StoreRequest extends Request
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
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
         'name' => 'required|regex:/^[\pL\s]+$/u',
         'code' => 'required|alpha_num',
         'facultad_id' => 'required|exists:facultades,id',
      ];
   }
}

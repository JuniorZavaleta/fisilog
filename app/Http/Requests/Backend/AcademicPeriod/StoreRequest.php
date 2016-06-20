<?php

namespace FisiLog\Http\Requests\Backend\AcademicPeriod;

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
      $date = 'd/m/Y';

      return [
         'name' => 'required',
         'start_date' => 'required|date_format:'.$date,
         'end_date'   => 'required|after:start_date|date_format:'.$date,
      ];
   }
}

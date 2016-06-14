<?php

namespace FisiLog\Http\Requests\Backend\AcademicPlan;

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
      $this_year = date('Y');

      return [
         'name' => 'required|regex:/^[\pL\s]+$/u',
         'year_of_publication' => 'required|integer|max:'.$this_year,
      ];
   }
}

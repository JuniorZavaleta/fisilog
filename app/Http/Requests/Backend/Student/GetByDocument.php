<?php

namespace FisiLog\Http\Requests\Backend\Student;

use FisiLog\Http\Requests\Request;

class GetByDocument extends Request
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
         'document_type' => 'required|exists:document_types,id',
         'document_code' => 'required|exists:documents,code',
      ];
   }

   public function response(array $errors)
   {
      $new_errors = [];
      foreach ($errors as $error_attribute)
         foreach ($error_attribute as $error)
            $new_errors[] = $error;

      return response()->json([
         'errors' => $new_errors,
      ], 422);
   }
}

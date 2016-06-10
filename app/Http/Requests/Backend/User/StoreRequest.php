<?php

namespace FisiLog\Http\Requests\Backend\User;

use FisiLog\Http\Requests\Request;

class StoreRequest extends Request
{
   public function authorize()
   {
      return true;
   }

   public function rules()
   {
      $rules = [
         'name'          => 'required|regex:/^[\pL\s]+$/u',
         'lastname'      => 'required|regex:/^[\pL\s]+$/u',
         'email'         => 'required|email',
         'document_type' => 'required|exists:document_types,id',
         'document_code' => 'required',
         'phone'         => 'required|numeric',
         'user_type'     => 'required|in:1,2',
         'password'      => 'required',
         'photo'         => 'required|image',
      ];

      $user_type = $this->request->get('user_type');

      if ($user_type == 1) {
         $rules['school_id']     = 'required|exists:schools,id';
         $rules['student_code']  = 'required|numeric';
         $rules['year_of_entry'] = 'required|numeric|digits:4';
      } elseif($user_type == 2) {
         $rules['academic_department_id'] = 'required|exists:academic_departments,id';
         $rules['professor_type'] = 'required|in:1,2,3';
      }

      return $rules;
   }
}

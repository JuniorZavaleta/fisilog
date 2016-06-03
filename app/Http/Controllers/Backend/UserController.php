<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Http\Requests\Backend\User\StoreRequest;
use FisiLog\Services\UserRegisterService;

class UserController extends Controller
{
   public function __construct(DaoEloquentFactory $dao, UserRegisterService $user_register_service )
   {
      $this->document_type_persistence       = $dao->getDocumentTypeDAO();
      $this->school_persistence              = $dao->getSchoolDAO();
      $this->academic_dep_persistence        = $dao->getAcademicDepartmentDAO();
      $this->user_register_service           = $user_register_service;
   }

   public function create()
   {
      $document_types       = $this->document_type_persistence->getAll();
      $schools              = $this->school_persistence->getAll();
      $academic_departments = $this->academic_dep_persistence->getAll();
      $professor_types      = config('enums.professor_types');
      $user_types           = config('enums.user_types');

      $data = [
         'document_types'       => $document_types,
         'schools'              => $schools,
         'academic_departments' => $academic_departments,
         'professor_types'      => $professor_types,
         'user_types'           => $user_types,
      ];

      return view('backend.users.create', $data);
   }

   public function store(StoreRequest $request)
   {
      $this->user_register_service->registerUser($request);
   }
}

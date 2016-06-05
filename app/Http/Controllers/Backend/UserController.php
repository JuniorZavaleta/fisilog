<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Http\Requests\Backend\User\StoreRequest;

class UserController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->document_type_persistence       = $dao->getDocumentTypeDAO();
      $this->school_persistence              = $dao->getSchoolDAO();
      $this->academic_dep_persistence        = $dao->getAcademicDepartmentDAO();
      $this->notification_channel_persistence = $dao->getNotificationChannelDAO();
      $this->user_type_persistence           = $dao->getUserTypeDAO();
   }

   public function create()
   {
      $document_types       = $this->document_type_persistence->getAll();
      $schools              = $this->school_persistence->getAll();
      $academic_departments = $this->academic_dep_persistence->getAll();
      $professor_types      = config('enums.professor_types');
      $user_types           = $this->user_type_persistence->getAll();

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

   }
}

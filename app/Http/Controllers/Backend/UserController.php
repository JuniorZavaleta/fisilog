<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Models\User;
use FisiLog\Models\Student;
use FisiLog\Models\Professor;
use FisiLog\Models\Document;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Http\Requests\Backend\User\StoreRequest;
use FisiLog\Services\UserRegisterService;

class UserController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->document_type_persistence       = $dao->getDocumentTypeDAO();
      $this->school_persistence              = $dao->getSchoolDAO();
      $this->academic_dep_persistence        = $dao->getAcademicDepartmentDAO();
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
      $user = new User;
      $user_types = config('enums.user_types');

      $password       = $request->input('password');
      $user_type      = $request->input('user_type');
      $school_id      = $request->input('school_id');
      $document_type  = $request->input('document_type');
      $professor_type = $request->input('professor_type');

      if( $user_types[$user_type] == "Estudiante") {
         $student = new Student;
      } elseif( $user_types[$user_type] == "Profesor" ) {
         $professor = new Professor;
      }

      $user->name                    = $request->input('name');
      $user->lastname                = $request->input('lastname');
      $user->email                   = $request->input('email');
      $user->password                = bcrypt($password);
      $user->phone                   = $request->input('phone');
      $user->type                    = $user_types[$user_type];
      $user->photo_url               = $this->urlToString($request->file('photo'));
      $user->notification_channel_id = 2;
      $user->save();

      $document = new Document;
      $document->user_id          = $user->id;
      $document->document_type_id = $document_type;
      $document->code             = $request->input('document_code');

      $document->save();

      if ( $user_type == 1 ) {
         $student->user_id       = $user->id;
         $student->school_id     = $school_id;
         $student->code          = $request->input('student_code');
         $student->year_of_entry = $request->input('year_of_entry');

         $student->save();
      } elseif( $user_type == 2 ) {
         $professor->user_id                = $user->id;
         $professor_types                   = config('enums.professor_types');
         $professor->academic_department_id = $request->input('academic_department_id');
         $professor->type                   = $professor_types[$professor_type];

         $professor->save();
      }
   }

   public function urlToString($photo_url){
      $filename  = time() . '.' . $photo_url->getClientOriginalName();
      $url = "img/users/" . $filename;
      return $url;
   }
}

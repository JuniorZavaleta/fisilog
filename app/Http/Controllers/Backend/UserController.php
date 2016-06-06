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

use FisiLog\BusinessClasses\User as UserClass;
use FisiLog\BusinessClasses\NotificationChannel as NotificationChannel;
use FisiLog\BusinessClasses\Student as StudentClass;

class UserController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->document_type_persistence       = $dao->getDocumentTypeDAO();
      $this->school_persistence              = $dao->getSchoolDAO();
      $this->academic_dep_persistence        = $dao->getAcademicDepartmentDAO();
      $this->notification_channel_persistence = $dao->getNotificationChannelDAO();
      $this->user_type_persistence           = $dao->getUserTypeDAO();

      $this->user_persistence                = $dao->getUserDAO();
      $this->student_persistence             = $dao->getStudentDAO();

      $this->notification_by_email_id        = 2;
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
      extract($request->all());

      $user_type_id = $request->input('user_type');
      $user_type = $this->user_type_persistence->findById($user_type_id);

      $photo_url = $this->urlToString($request->file('photo'));

      $notification_channel = $this->notification_channel_persistence->findById($this->notification_by_email_id);

      $user = new UserClass($name, $lastname, $email, $password, $phone, $user_type, $photo_url, $notification_channel);

      $this->user_persistence->save($user);

      $document = new Document;
      $document->user_id          = $user->getId();
      $document->document_type_id = $document_type;
      $document->code             = $request->input('document_code');

      $document->save();

      if ( $user->isStudent() ) {

         $school = $this->school_persistence->findById($school_id);

         $student = new StudentClass($user, $school, $year_of_entry, $student_code);

         $this->student_persistence->save($student);

      } elseif( $user->isProfessor() ) {

         $professor->user_id                = $user->getId();
         $professor_types                   = config('enums.professor_types');
         $professor->academic_department_id = $request->input('academic_department_id');
         $professor->type                   = $professor_types[$professor_type];

         $professor->save();
      }
   }

   public function urlToString($photo_url)
   {
      $filename  = time() . '.' . $photo_url->getClientOriginalName();
      $url = "img/users/" . $filename;

      return $url;
   }
}

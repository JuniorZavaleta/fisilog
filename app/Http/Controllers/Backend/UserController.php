<?php
namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Http\Requests\Backend\User\StoreRequest;

use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\Student;
use FisiLog\BusinessClasses\Professor;
use FisiLog\BusinessClasses\Document;

class UserController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->document_persistence            = $dao->getDocumentDAO();
      $this->document_type_persistence       = $dao->getDocumentTypeDAO();
      $this->school_persistence              = $dao->getSchoolDAO();
      $this->academic_dep_persistence        = $dao->getAcademicDepartmentDAO();
      $this->notification_channel_persistence = $dao->getNotificationChannelDAO();
      $this->user_type_persistence           = $dao->getUserTypeDAO();

      $this->user_persistence                = $dao->getUserDAO();
      $this->student_persistence             = $dao->getStudentDAO();
      $this->professor_persistence           = $dao->getProfessorDAO();

      $this->notification_by_email_id        = 2;
   }

   public function index()
   {
      $users = $this->user_persistence->paginate();

      $data = [
         'users' => $users,
      ];

      return view('backend.users.index', $data);
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

      $photo_url = $this->urlToString($photo);

      $notification_channel = $this->notification_channel_persistence->findById($this->notification_by_email_id);

      $user = new User($name, $lastname, $email, $password, $phone, $user_type, $photo_url, $notification_channel);

      $this->user_persistence->save($user);

      $document_type = $this->document_type_persistence->findById($document_type);

      $document = new Document($user, $document_type, $document_code);

      $this->document_persistence->save($document);

      if ( $user->isStudent() ) {

         $school = $this->school_persistence->findById($school_id);

         $this->student_persistence->save(new Student($user, $school, $year_of_entry, $student_code));

      } elseif( $user->isProfessor() ) {

         $academic_department = $this->academic_dep_persistence->findById($academic_department_id);

         $this->professor_persistence->save(new Professor($user, $academic_department, $professor_type));

      }

      return redirect()->route('users.index')->with('message', 'Usuario registrado exitosamente.');
   }

   public function urlToString($photo)
   {
      $filename  = time() . '.' . $photo->getClientOriginalName();
      $url = "img/users/" . $filename;

      return $url;
   }
}

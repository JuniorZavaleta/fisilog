<?php
namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Http\Requests\Backend\User\StoreRequest;

use FisiLog\Models\User;
use FisiLog\Models\UserType;
use FisiLog\Models\DocumentType;
use FisiLog\Models\School;
use FisiLog\Models\AcademicDepartment;

class UserController extends Controller
{
   public function __construct()
   {
      $this->notification_by_email_id        = 2;
   }

   public function index()
   {
      $users = User::paginate(10);

      return view('backend.users.index', compact('users'));
   }

   public function create()
   {
      $document_types       = DocumentType::all();
      $schools              = School::all();
      $academic_departments = AcademicDepartment::all();
      $professor_types      = config('enums.professor_types');
      $user_types           = UserType::all();

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

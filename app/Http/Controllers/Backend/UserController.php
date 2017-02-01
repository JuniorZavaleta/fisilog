<?php
namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Http\Requests\Backend\User\StoreRequest;

use FisiLog\Models\User;
use FisiLog\Models\Student;
use FisiLog\Models\Professor;
use FisiLog\Models\UserType;
use FisiLog\Models\DocumentType;
use FisiLog\Models\Document;
use FisiLog\Models\School;
use FisiLog\Models\AcademicDepartment;
use FisiLog\Models\NotificationChannel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->notification_by_email_id = 2;
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

        return view('backend.users.create', compact(
            'document_types', 'schools', 'academic_departments', 'professor_types', 'user_types'
        ));
    }

    public function store(StoreRequest $request)
    {
        $user_type_id = $request->get('user_type');
        $user_type    = UserType::find($user_type_id);

        $photo_url = $this->urlToString($request->file('photo'));

        $user = new User;
        $user->name         = $request->get('name');
        $user->lastname     = $request->get('lastname');
        $user->email        = $request->get('email');
        $user->password     = bcrypt($request->get('password'));
        $user->phone        = $request->get('phone');
        $user->user_type_id = $request->get('user_type');
        $user->photo_url    = $photo_url;
        $user->notification_channel_id = NotificationChannel::EMAIl_CHANNEL;
        $user->notification_receipt    = $request->get('email');
        $user->save();

        $document = new Document;
        $document->user_id          = $user->id;
        $document->document_type_id = $request->get('document_type');
        $document->code             = $request->get('document_code');
        $document->save();

        if ($user_type_id == UserType::STUDENT_TYPE) {
            $student = new Student;
            $student->school_id     = $request->get('school_id');
            $student->year_of_entry = $request->get('year_of_entry');
            $student->code          = $request->get('student_code');
            $student->save();
        } elseif($user_type_id == UserType::PROFESSOR_TYPE) {
            $professor = new Professor;
            $professor->type                   = $request->get('professor_type');
            $professor->academic_department_id = $request->get('academic_department_id');
            $professor->save();
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

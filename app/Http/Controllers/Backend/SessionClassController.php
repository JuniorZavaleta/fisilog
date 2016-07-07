<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Http\Requests\Backend\SessionClass\CancelRequest;

use Auth;

class SessionClassController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->document_type_persistence = $dao->getDocumentTypeDAO();
      $this->student_persistence = $dao->getStudentDAO();
      $this->clase_persistence = $dao->getClaseDAO();
      $this->session_class_persistence = $dao->getSessionClassDAO();
      $this->user_persistence = $dao->getUserDao();
   }

   public function show($clase, $id)
   {
      $document_types = $this->document_type_persistence->getAll();
      $clase = $this->clase_persistence->createBusinessClass($clase);
      $students = $this->student_persistence->getByGroupId($clase->getGroupId());

      $data = [
         'document_types' => $document_types,
         'clase' => $clase,
         'students' => $students,
      ];

      return view('backend.classes.sessions.index', $data);
   }

   public function cancel($clase, $session_class, CancelRequest $request)
   {
      $user = $this->user_persistence->createBusinessClass( Auth::user() );
      $clase = $this->clase_persistence->createBusinessClass($clase);
      $session_class = $this->session_class_persistence->createBusinessClass($session_class);

      $plain_password = $request->input('password');

      if (Auth::attempt(['email' => $user->getEmail() , 'password' => $plain_password ])) {
         $this->session_class_persistence->cancel($session_class->getId());

         $students = $this->student_persistence->getByGroupId($clase->getGroupId());

         $data = [
            'course_name' => $clase->getCourseName(),
         ];

         foreach ($students as $student)
            $student->notify('cancel_class', $data, 'Clase Cancelada');

         return response(['message' => 'OK']);
      }

      return response(['message' => 'No autorizado'], 403);
   }
}

<?php

namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Http\Requests\Backend\SessionClass\CancelRequest;

use Auth;

use FisiLog\Models\DocumentType;
use FisiLog\Models\Clase;
use FisiLog\Models\Student;

class SessionClassController extends Controller
{
    public function show($clase_id, $session_class_id)
    {
        $document_types = DocumentType::all();
        $clase = Clase::find($clase_id);
        $students = Student::whereHas('groups', function ($groups) use ($clase) {
            $groups->where('groups.id', $clase->group_id);
        })->get();

        return view('backend.classes.sessions.index', compact('document_types', 'clase', 'students'));
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

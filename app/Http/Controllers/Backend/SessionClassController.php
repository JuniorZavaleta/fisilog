<?php
namespace FisiLog\Http\Controllers\Backend;

use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

class SessionClassController extends Controller
{
   public function __construct(DaoEloquentFactory $dao)
   {
      $this->document_type_persistence = $dao->getDocumentTypeDAO();
      $this->student_persistence = $dao->getStudentDAO();
      $this->clase_persistence = $dao->getClaseDAO();
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
}

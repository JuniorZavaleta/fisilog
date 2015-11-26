<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\User;
use FisiLog\Dao\DaoEloquentFactory;
use FisiLog\BusinessClasses\Attendance;

class AttendanceRegisterService {
  public function __construct(DaoEloquentFactory $dao) {
    $this->userPersistence = $dao->getUserDAO();
    $this->documentTypePersistence = $dao->getDocumentTypeDAO();
    $this->documentPersistence = $dao->getDocumentDAO();
    $this->classPersistence = $dao->getClaseDAO();
    $this->attendancePersistence = $dao->getAttendanceDAO();
    $this->groupPersistence = $dao->getGroupDAO();
    $this->studentPersistence = $dao->getStudentDAO();
    $this->professorPersistence = $dao->getProfessorDAO();
  }
  public function index() {

  }
  public function preRegisterStudent($data) {
    $document_type = $this->documentTypePersistence->findById( $data['document_type'] );
    $document = $this->documentPersistence->findByCodeAndDocumentType( $data['document_code'], $document_type);
    if ($document == null)
      return null;
    $user = $this->userPersistence->findByDocument($document);

    return $user;
  }
  public function registerStudent($data) {
    $user = $this->preRegisterStudent($data);
    $student = $this->studentPersistence->findByUser($user);
    $groups = $this->groupPersistence->findByStudent($student);
    $clase = $this->classPersistence->findById( $data ['clase_id'] );

    foreach( $groups as $group ) {
      foreach ($group->getClases() as $value) {
        if ( $value->getId() == $clase->getId() ) {
          $attendance = new Attendance;
          $attendance->setUser($user);
          $attendance->setClase($clase);
          $attendance->setDate(date('Y-m-d'));
          $attendance->setVerified(true);

          $attendance = $this->attendancePersistence->save($attendance);

          return $attendance;
        }
      }
    }

    return null;
  }
  public function registerProfessor($data) {
    $user = $this->professorPersistence->findById( $data['user_id'] );
    $clase = $this->classPersistence->findById( $data ['clase_id'] );
    $attendance = $this->attendancePersistence->getAttendancesByUserAndClaseAndDate($user, $clase, date('Y-m-d'));

    if ( $clase != null && $attendance == null) {
      $professor = $clase->getProfessor();
      if ( $professor->getId() == $user->getId() ) {
        $new_attendance = new Attendance;
        $user->setId($data['user_id']);
        $new_attendance->setUser($user);
        $new_attendance->setClase($clase);
        $new_attendance->setDate(date('Y-m-d'));
        $new_attendance->setVerified(false);

        $new_attendance = $this->attendancePersistence->save($new_attendance);

        return $new_attendance;
      }
    }

    return null;
  }
}
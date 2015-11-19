<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\User;
use FisiLog\Dao\DaoEloquentFactory;

class AttendanceRegisterService {
  public function __construct(DaoEloquentFactory $dao) {
    $this->userPersistence = $dao->getUserDAO();
    $this->documentTypePersistence = $dao->getDocumentTypeDAO();
    $this->documentPersistence = $dao->getDocumentDAO();
    $this->studentPersistence = $dao->getStudentDAO();
    $this->professorPersistence = $dao->getProfessorDAO();
    $this->schoolPersistence = $dao->getSchoolDAO();
    $this->academicDepartmentPersistence = $dao->getAcademicDepartmentDAO();
  }
  public function registerStudent() {
    
  }
  public function registerProfessor() {
    
  }
}
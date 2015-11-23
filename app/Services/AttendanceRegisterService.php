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
    $this->classPersistence = $dao->getClaseDAO();
  }
  public function index() {

  }
  public function preRegisterStudent($data) {
    $document_type = $this->documentTypePersistence->findById( $data['document_type'] );
    $document = $this->documentPersistence->findByCodeAndDocumentType( $data['document_code'], $document_type);
    $user = $this->userPersistence->findByDocument($document);
    dd($user);
    return $user;
  }
  public function registerStudent() {
    
  }
  public function registerProfessor() {
    
  }
}
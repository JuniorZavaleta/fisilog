<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\Student;
use FisiLog\BusinessClasses\Professor;
use FisiLog\BusinessClasses\Document;
use FisiLog\Dao\DaoEloquentFactory;

class UserRegisterService {
  public function __construct(DaoEloquentFactory $dao) {
    $this->userPersistence = $dao->getUserDAO();
    $this->documentTypePersistence = $dao->getDocumentTypeDAO();
    $this->documentPersistence = $dao->getDocumentDAO();
    $this->studentPersistence = $dao->getStudentDAO();
    $this->schoolPersistence = $dao->getSchoolDAO();
  }
  public function registerUser($data) {
    if( $data['user_type'] == 1 ) {
      $user = new Student;
    } elseif( $data['user_type'] == 2 ) {
      $user = new Professor;
    }
    $user->setName( $data['name'] );
    $user->setLastname( $data['lastname'] );
    $user->setEmail( $data['email'] );
    $user->setPhone( $data['phone'] );
    $user = $this->userPersistence->save($user);

    $document_type = $this->documentTypePersistence->findById( $data['document_type'] );

    $document = new Document;
    $document->setUser( $user );
    $document->setDocumentType( $document_type );
    $document->setCode( $data['document_code'] );

    $this->documentPersistence->save($document);

    if ( $data['user_type'] == 1 ) {
      $school = $this->schoolPersistence->findById( $data['school_id'] );
      $user->setSchool($school);
      $user->setCode( $data['student_code'] );
      $user->setYearOfEntry( $data['year_of_entry'] );

      $this->studentPersistence->save($user);
    }
  }
}
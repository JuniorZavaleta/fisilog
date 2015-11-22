<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\Student;
use FisiLog\BusinessClasses\Professor;
use FisiLog\BusinessClasses\Document;
use FisiLog\Dao\DaoEloquentFactory;
use Auth;

class UserLoginService {
  public function __construct(DaoEloquentFactory $dao) {
    $this->userPersistence = $dao->getUserDAO();
    $this->documentTypePersistence = $dao->getDocumentTypeDAO();
    $this->documentPersistence = $dao->getDocumentDAO();
  }
  public function loginUser($data) {
    $user = $this->userPersistence->findByEmail( $data['email'] );
    if ($user == null)
      return false;
    if (isset($data['password']))
      return loginByPassword($data);
    else
      return loginByDocument($data);
  }
  private function loginByPassword($data) {
    return Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']]);
  }
  private function loginByDocument($data) {
    $document_type = $this->documentTypePersistence->findById( $data['document_type'] );
    if ($document_type == null)
      return false;
    $document = $this->findByUserAndDocumentType($user, $document_type);
    if ($document == null)
      return false
    return $data['document_code'] == $document->getCode());
  }
}
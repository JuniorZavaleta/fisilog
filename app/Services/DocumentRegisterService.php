<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\Document;
use FisiLog\BusinessClasses\User;
use FisiLog\Dao\DaoEloquentFactory;

class DocumentRegisterService {
  public function __construct(DaoEloquentFactory $dao) {
    $this->documentTypePersistence = $dao->getDocumentTypeDAO();
    $this->documentPersistence = $dao->getDocumentDAO();
  }

  public function registerDocument($data) {
    $document_type = $this->documentTypePersistence->findById( $data['document_type'] );
    $document = new Document;
    $user = new User;
    $user->setId($data['user_id']);
    $document->setDocumentType( $document_type );
    $document->setCode( $data['document_code'] );
    $document->setUser($user); 
    $this->documentPersistence->save($document);
  }
}
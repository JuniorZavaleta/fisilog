<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\Document;
use FisiLog\BusinessClasses\User;
use FisiLog\Dao\DaoEloquentFactory;

class DocumentService {
  public function __construct(DaoEloquentFactory $dao) {
    $this->documentPersistence = $dao->getDocumentDAO();
  }

  public function findByCode($code) {
    $document_model    = $this->documentPersistence->findByCode($code);
    $document_business = new Document;
    if (!is_null($document_model)) {
      $document_business->setCode($code);
      return $document_business;
    }
    return null;
  }
}
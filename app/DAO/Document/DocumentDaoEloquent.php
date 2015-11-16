<?php
namespace FisiLog\DAO\Document;
use FisiLog\BusinessClasses\Document as DocumentBusiness;
use FisiLog\Models\Document as DocumentModel;

class DocumentDaoEloquent implements DocumentDao {
  public function save(DocumentBusiness $documentBusiness) {
    $documentModel = new DocumentModel;
    $documentModel->user_id = $documentBusiness->getUser()->getId();
    $documentModel->document_type_id = $documentBusiness->getDocumentType()->getId();
    $documentModel->code = $documentBusiness->getCode();
    $documentModel->save();
    $documentBusiness->setId($documentModel->id);

    return $documentBusiness;
  }
}
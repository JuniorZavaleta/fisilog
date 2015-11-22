<?php
namespace FisiLog\DAO\Document;
use FisiLog\BusinessClasses\Document as DocumentBusiness;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\BusinessClasses\DocumentType as DocumentTypeBusiness;
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
  public function findByUserAndDocumentType(UserBusiness $user, DocumentTypeBusiness $documentType) {
    $documentModel = DocumentModel::where('user_id', '=' ,$user->getId())
                                  ->where('document_type_id', '=', $documentType->getId())
                                  ->first();
    if ($documentModel == null)
      return null;

    $documentBusiness = new DocumentBusiness;
    $documentBusiness->setId($documentModel->id);
    $documentBusiness->setUser($user);
    $documentBusiness->setDocumentType($documentType);
    $documentBusiness->setCode($documentModel->code);

    return $documentBusiness;
  }
}
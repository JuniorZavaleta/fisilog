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

    return $this->createDocument($documentModel, $user, $document_type);
  }
  public function findByCodeAndDocumentType($code, DocumentTypeBusiness $documentType) {
    $documentModel = DocumentModel::where('code','=',$code)
                                  ->where('document_type_id', '=', $documentType->getId())
                                  ->first();

    return $this->createDocument($documentModel, null, $documentType);
  }
  private function createDocument(DocumentModel $documentModel = null, UserBusiness $user = null, DocumentTypeBusiness $document_type = null) {
    if ($documentModel == null)
      return null;

    $documentBusiness = new DocumentBusiness;
    $documentBusiness->setId($documentModel->id);
    $documentBusiness->setCode($documentModel->code);
    if ($user != null)
      $documentBusiness->setUser($user);
    if ($document_type != null)
      $documentBusiness->setDocumentType($document_type);

    return $documentBusiness;
  }
  public function findByCode($code) {
    $document = DocumentModel::where('code', $code)->get()->first();
    return $this->createDocument($document, null,null);
  }
}
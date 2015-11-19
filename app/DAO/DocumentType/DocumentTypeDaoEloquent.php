<?php
namespace FisiLog\DAO\DocumentType;
use FisiLog\BusinessClasses\DocumentType as DocumentTypeBusiness;
use FisiLog\Models\DocumentType as DocumentTypeModel;

class DocumentTypeDaoEloquent implements DocumentTypeDao {
  public function findById($id) {
    $documentTypeModel = DocumentTypeModel::find($id);
    $documentTypeBusiness = new DocumentTypeBusiness;
    $documentTypeBusiness->setId($id);
    $documentTypeBusiness->setName($documentTypeModel->name);

    return $documentTypeBusiness;
  }
  public function getAll() {
    $documentTypeBusiness = [];
    $documentTypeModel = DocumentTypeModel::all();
    foreach ($documentTypeModel as $value) {
      $newDocumentTypeBusiness = new DocumentTypeBusiness;
      $newDocumentTypeBusiness->setId($value->id);
      $newDocumentTypeBusiness->setName($value->name);

      $documentTypeBusiness[] = $newDocumentTypeBusiness;
    }
    return $documentTypeBusiness;
  }
}
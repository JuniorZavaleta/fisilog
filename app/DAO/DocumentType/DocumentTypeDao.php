<?php
namespace FisiLog\DAO\DocumentType;
use FisiLog\BusinessClasses\DocumentType as DocumentTypeBusiness;
interface DocumentTypeDao {
  public function findById($id);
}
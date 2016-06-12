<?php
namespace FisiLog\DAO\DocumentType;

use FisiLog\BusinessClasses\DocumentType as DocumentTypeBusiness;
use FisiLog\Models\DocumentType as DocumentTypeModel;

class DocumentTypeDaoEloquent implements DocumentTypeDao {

   public function findById($id)
   {
      $document_type_model = DocumentTypeModel::find($id);

      return static::createBusinessClass($document_type_model);
   }

   public function getAll()
   {
      $document_types_business = [];
      $document_types_model = DocumentTypeModel::all();

      foreach ($document_types_model as $document_type_model) {
         $document_types_business[] = static::createBusinessClass($document_type_model);

      return $document_types_business;
   }

   public static function createBusinessClass(DocumentTypeModel $document_type_model = null)
   {
      if ($document_type_model == null)
         return null;

      $document_type_business = new DocumentTypeBusiness(
         $document_type_model->id,
         $document_type_model->name
      );

      return $document_type_business;
   }
}
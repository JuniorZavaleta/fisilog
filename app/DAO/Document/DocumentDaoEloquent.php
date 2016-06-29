<?php
namespace FisiLog\DAO\Document;

use FisiLog\BusinessClasses\Document as DocumentBusiness;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\BusinessClasses\DocumentType as DocumentTypeBusiness;

use FisiLog\Models\Document as DocumentModel;

use FisiLog\DAO\User\UserDaoEloquent as UserModel;
use FisiLog\DAO\DocumentType\DocumentTypeDaoEloquent as DocumentTypeModel;

class DocumentDaoEloquent implements DocumentDao {

   public function save(DocumentBusiness &$document_business)
   {
      $document_model = DocumentModel::create($document_business->toArray());
      $document_business->setId($document_model->id);
   }

   public static function createBusinessClass(DocumentModel $document_model = null)
   {
      if ($document_model == null)
         return null;

      $documentBusiness = new DocumentBusiness(
         UserModel::createBusinessClass($document_model->user),
         DocumentTypeModel::createBusinessClass($document_model->document_type),
         $document_model->code,
         $document_model->id
      );

      return $documentBusiness;
   }

   public function findById($id)
   {
      $document = DocumentModel::find($id);

      return $this->createBusinessClass($document);
   }

   public function getByUserId($user_id)
   {
      $documents_model = DocumentModel::where('user_id', $user_id)->get();

      $documents = [];

      foreach ($documents_model as $document_model)
         $documents[] = static::createBusinessClass($document_model);

      return $documents;
   }
}
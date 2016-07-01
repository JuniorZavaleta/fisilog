<?php
namespace FisiLog\BusinessClasses;

use Illuminate\Contracts\Support\Arrayable;

use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\DocumentType;

class Document implements Arrayable {

   private $id;

   private $code;

   private $user;

   private $documentType;

   public function __construct($user, $document_type, $code, $id = null)
   {
      $this->setUser($user);
      $this->setDocumentType($document_type);
      $this->code = $code;
      $this->id = $id;
   }

   public function setId($id)
   {
      $this->id = $id;
   }

   public function getId()
   {
      return $this->id;
   }

   public function getCode()
   {
      return $this->code;
   }

   public function setUser(User $user)
   {
      $this->user = $user;
   }

   public function getUser()
   {
      return $this->user;
   }

   public function setDocumentType(DocumentType $documentType)
   {
      $this->documentType = $documentType;
   }

   public function getDocumentType()
   {
      return $this->documentType;
   }

   public function getDocumentTypeName()
   {
      return $this->documentType->getName();
   }

   /**
     * Get the instance as an array.
     *
     * @return array
     */
   public function toArray()
   {
      return [
         'id' => $this->id,
         'user_id' => $this->getUser()->getId(),
         'document_type_id' => $this->getDocumentType()->getId(),
         'code' => $this->code,
      ];
   }
}
<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\DocumentType;
class Document {
	private $id;
	private $code;
	private $user;
	private $documentType;

	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setCode($code) {
		$this->code = $code;
	}
	public function getCode() {
		return $this->code;
	}
	public function setUser(User $user) {
		$this->user = $user;
	}
	public function getUser() {
		return $this->user;
	}
	public function setDocumentType(DocumentType $documentType) {
		$this->documentType = $documentType;
	}
	public function getDocumentType() {
		return $this->documentType;
	}
}
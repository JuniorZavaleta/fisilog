<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\Document;
use FisiLog\Dao\DaoEloquentFactory;

class UserRegisterService {
	public function __construct(DaoEloquentFactory $dao) {
		$this->userPersistence = $dao->getUserDAO();
		$this->documentTypePersistence = $dao->getDocumentTypeDAO();
		$this->documentPersistence = $dao->getDocumentDAO();
	}
	public function registerUser($data) {
		$user = new User;
		$user->setName( $data['name'] );
		$user->setLastname( $data['lastname'] );
		$user->setEmail( $data['email'] );
		$user->setPhone( $data['phone'] );
		$user = $this->userPersistence->save($user);

		$document_type = $this->documentTypePersistence->findById( $data['document_type'] );

		$document = new Document;
		$document->setUser( $user );
		$document->setDocumentType( $document_type );
		$document->setCode( $data['document_code'] );

		$this->documentPersistence->save($document);
	}
}
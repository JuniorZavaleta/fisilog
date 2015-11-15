<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\Document;
use FisiLog\Dao\DaoEloquentFactory;

class UserRegisterService {
	public function __construct(DaoEloquentFactory $dao) {
		$this->userPersistence = $dao->getUserDAO();
	}
	public function registerUser($data) {
		$user = new User;
		$user->setName( $data['name'] );
		$user->setLastname( $data['lastname'] );
		$user->setEmail( $data['email'] );

		$this->userPersistence->save($user);
	}
}
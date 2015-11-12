<?php
namespace FisiLog\Services;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\Document;
use FisiLog\Persistences\UserPersistence;
class UserRegisterService {
	public function registerUser($data) {
		$this->persistenceUser = new UserPersistence;
		$user = new User;
		$user->setName( $data['name'] );
		$user->setLastname( $data['lastname'] );
		$user->setEmail( $data['email'] );

		$this->persistenceUser->save($user);
	}
}
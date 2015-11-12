<?php
namespace FisiLog\Persistences;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\Models\User as UserModel;

class UserPersistence {
	public function save(UserBusiness $userBusiness) {
		$userModel = new UserModel;
		$userModel->name = $userBusiness->getName();
		$userModel->lastname = $userBusiness->getLastname();
		$userModel->email = $userBusiness->getEmail();
		$userModel->save();
	}
}
<?php
namespace FisiLog\DAO\User;
use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\Models\User as UserModel;

class UserDaoEloquent implements UserDao {
	public function save(UserBusiness $userBusiness) {
		$userModel = new UserModel;
		$userModel->name = $userBusiness->getName();
		$userModel->lastname = $userBusiness->getLastname();
		$userModel->email = $userBusiness->getEmail();
		$userModel->phone = $userBusiness->getPhone();
		$userModel->save();
		$userBusiness->setId($userModel->id);

		return $userBusiness;
	}
}
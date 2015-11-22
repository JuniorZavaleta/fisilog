<?php
namespace FisiLog\DAO\User;
use FisiLog\BusinessClasses\User as UserBusiness;
interface UserDao {
	public function save(UserBusiness $userBusiness);
	public function findByEmail($email);
}
<?php
namespace FisiLog\DAO;
use FisiLog\DAO\User\UserDaoEloquent;
class DaoEloquentFactory {
	public static function getUserDAO() {
		return new UserDaoEloquent;
	}
}
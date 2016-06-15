<?php
namespace FisiLog\DAO\UserType;

use FisiLog\BusinessClasses\UserType as UserTypeBusiness;

interface UserTypeDao {
   public function getAll();
   public function save(UserTypeBusiness $userType);
   public function findById($id);
}
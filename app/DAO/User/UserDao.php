<?php
namespace FisiLog\DAO\User;

use FisiLog\BusinessClasses\User as UserBusiness;

interface UserDao {
   public function save(UserBusiness &$userBusiness);
   public function findById($id);
   public function findByEmail($email);
   public function findByDocument($document_code, $document_type_id);
   public function paginate($per_page, $page);
}
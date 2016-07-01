<?php
namespace FisiLog\DAO\Document;

use FisiLog\BusinessClasses\Document;

interface DocumentDao {
   public function save(Document &$document);
   public function getByUserId($user_id);
   public function findById($id);
}
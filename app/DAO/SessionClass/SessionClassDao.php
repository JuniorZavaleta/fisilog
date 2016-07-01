<?php
namespace FisiLog\DAO\SessionClass;
use FisiLog\BusinessClasses\SessionClass;

interface SessionClassDao {
   public function findNextSessionClass($clase_id);
   public function getByClaseId($clase_id);
}
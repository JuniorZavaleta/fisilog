<?php
namespace FisiLog\DAO\SessionClass;
use FisiLog\BusinessClasses\SessionClass;

interface SessionClassDao {
   public function findSessionClassToNextWeek($clase_id);
}
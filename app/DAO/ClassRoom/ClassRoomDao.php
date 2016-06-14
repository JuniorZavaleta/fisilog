<?php
namespace FisiLog\DAO\ClassRoom;

use FisiLog\BusinessClasses\ClassRoom;

interface ClassRoomDao {
   public function save(ClassRoom &$class_room);
   public function findById($id);
   public function getAll();
   public function update(ClassRoom $class_room);
}
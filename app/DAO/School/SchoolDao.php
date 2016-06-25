<?php
namespace FisiLog\DAO\School;

use FisiLog\BusinessClasses\School;

interface SchoolDao {
   public function findById($id);
   public function getAll();
   public function save(School &$school);
   public function update(School $school);
   public function getByFacultadId($facultad_id);
}
<?php
namespace FisiLog\DAO\Facultad;

use FisiLog\BusinessClasses\Facultad;

interface FacultadDao {
   public function save(Facultad &$facultad);
   public function findById($id);
   public function getAll();
   public function update(Facultad $facultad);
}
<?php
namespace FisiLog\DAO\Facultad;

interface FacultadDao {
   public function findById($id);
   public function getAll();
}
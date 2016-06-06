<?php
namespace FisiLog\DAO\School;

interface SchoolDao {
   public function findById($id);
   public function getAll();
}
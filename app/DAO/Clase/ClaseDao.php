<?php
namespace FisiLog\DAO\Clase;

interface ClaseDao {
   public function getByProfessorId($professor_id);
   public function getByCourseId($course_id);
   public function findById($id);
}
<?php
namespace FisiLog\DAO\Clase;

interface ClaseDao {
   public function getByProfessorId($professor_id);
   public function getByCourseId($course_id, $academic_cycle_id);
   public function findById($id);
}
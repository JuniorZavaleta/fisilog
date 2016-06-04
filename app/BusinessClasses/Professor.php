<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\AcademicDepartment;
class Professor extends User {
   private $academicDepartment;
   private $professor_type;

   public static $nombrado_type   = 1;
   public static $contratado_type = 2;
   public static $auxiliar_type   = 3;

   public static $nombrado_type_name   = "Nombrado";
   public static $contratado_type_name = "Contratado";
   public static $auxiliar_type_name   = "Auxiliar";

   public function setAcademicDepartment(AcademicDepartment $academicDepartment) {
      $this->academicDepartment = $academicDepartment;
   }
   public function getAcademicDepartment(){
      return $this->academicDepartment;
   }
   public function setProfessorType($professor_type) {
      $this->professor_type = $professor_type;
   }
   public function getProfessorType() {
      return $this->professor_type;
   }
}

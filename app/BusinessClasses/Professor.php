<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\AcademicDepartment;
class Professor extends User {
	private $academicDepartment;
	private $type;

	public function setAcademicDepartment(AcademicDepartment $academicDepartment) {
		$this->academicDepartment = $academicDepartment;
	}
	public function getAcademicDepartment(){
		return $this->academicDepartment;
	}
	public function setType($type) {
		$this->type = $type;
	}
	public function getType() {
		return $this->type;
	}
}

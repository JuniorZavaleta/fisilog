<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\School;
class AcademicPlan {
	private $school;
	private $yearOfPublication;
	private $isActive;

	public function setSchool(School $school) {
		$this->school = $school;
	}
	public function getSchool() {
		return $this->school;
	}
	public function setYearOfPublication($yearOfPublication) {
		$this->yearOfPublication = $yearOfPublication;
	}
	public function getYearOfPublication() {
		return $this->yearOfPublication;
	}
	public function activate() {
		$this->isActive = true;
	}
	public function desactivate() {
		$this->isActive = false;
	}
	public function isActive() {
		return $this->isActive;
	}
}
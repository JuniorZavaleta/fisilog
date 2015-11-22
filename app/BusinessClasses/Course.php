<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\AcademicPlan;
class Course {
	private $id;
	private $name;
	private $code;
	private $quantityOfCredits;
	private $academicPlan;

	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
	public function setCode($code) {
		$this->code = $code;
	}
	public function getCode() {
		return $this->code;
	}
	public function setQuantityOfCredits($quantityOfCredits) {
		$this->quantityOfCredits = $quantityOfCredits;
	}
	public function getQuantityOfCredits() {
		return $this->quantityOfCredits;
	}
	public function setAcademicPlan(AcademicPlan $academicPlan) {
		$this->academicPlan = $academicPlan;
	}
	public function getAcademicPlan() {
		return $this->academicPlan;
	}
}
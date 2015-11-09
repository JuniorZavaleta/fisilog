<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\Facultad;
class AcademicCycle {
	private $facultad;
	private $startDate;
	private $endDate;
	private $year;
	private $name;

	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
	public function setFacultad(Facultad $facultad) {
		$this->facultad = $facultad;
	}
	public function getFacultad() {
		return $this->facultad;
	}
	public function setStartDate($startDate) {
		$this->startDate = $startDate;
	}
	public function getStartDate() {
		return $this->startDate;
	}
	public function setEndDate($endDate) {
		$this->endDate = $endDate;
	}
	public function getEndDate() {
		return $this->endDate;
	}
	public function setYear($year) {
		$this->year = $year;
	}
	public function getYear() {
		return $this->year;
	}
}
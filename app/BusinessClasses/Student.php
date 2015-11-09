<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\School;
class Student extends User {
	private $school;
	private $yearOfEntry;
	private $code;
	private $groups;

	public function setSchool(School $school) {
		$this->school = $school;
	}
	public function getSchool() {
		return $this->school;
	}
	public function setYearOfEntry($yearOfEntry) {
		$this->yearOfEntry = $yearOfEntry;
	}
	public function getYearOfEntry() {
		return $this->yearOfEntry;
	}
	public function setCode($code) {
		$this->code = $code;
	}
	public function getCode() {
		return $this->code;
	}
}
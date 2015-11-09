<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\Facultad;
class School {
	private $name;
	private $facultad;
	private $code;

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
	public function setCode($code) {
		$this->code = $code;
	}
	public function getCode() {
		return $this->code;
	}
}
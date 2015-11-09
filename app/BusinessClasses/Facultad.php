<?php
namespace FisiLog\BusinessClasses;
class Facultad {
	private $name;
	private $code;

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
}
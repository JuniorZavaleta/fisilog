<?php
namespace FisiLog\BusinessClasses;
class ClassRoom {
	private $name;

	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
}
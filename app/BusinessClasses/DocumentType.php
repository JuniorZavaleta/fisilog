<?php
namespace FisiLog\BusinessClasses;
class DocumentType {
	private $name;

	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
}
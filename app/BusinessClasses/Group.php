<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\CourseOpened;
use FisiLog\BusinessClasses\Clase;
class Group {
	private $id;
	private $courseOpened;
	private $numberOfGroup;
	private $clases;

	public function __construct() {
		$clases = [];
	}

	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setCourseOpened(CourseOpened $courseOpened) {
		$this->courseOpened = $courseOpened;
	}
	public function getCourseOpened() {
		return $this->courseOpened;
	}
	public function setNumberOfGroup($numberOfGroup) {
		$this->numberOfGroup = $numberOfGroup;
	}
	public function getNumberOfGroup() {
		return $this->numberOfGroup;
	}
	public function addClase(Clase $clase) {
		$this->clases[] = $clase;
	}
	public function getClases() {
		return $this->clases;
	}
}
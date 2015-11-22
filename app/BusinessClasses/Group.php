<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\CourseOpened;
use FisiLog\BusinessClasses\Student;
class Group {
	private $id;
	private $courseOpened;
	private $numberOfGroup;
	private $students;

	public function __construct() {
		$students = array();
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
	public function addStudent(Student $student) {
		$this->students[] = $student;
	}
	public function removeStudent(Student $studentToDelete) {
		foreach ($this->students as $key => $student) {
			if($student->code == $studentToDelete->code) {
				unset($this->students[$key]);
			}
		}
	}
}
<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\Course;
use FisiLog\BusinessClasses\AcademicCycle;
use FisiLog\BusinessClasses\Professor;
class CourseOpened {
	private $course;
	private $academicCycle;
	private $coordinator;

	public function setCourse(Course $course) {
		$this->course = $course;
	}
	public function getCourse() {
		return $this->course;
	}
	public function setAcademicCycle(AcademicCycle $academicCycle) {
		$this->academicCycle = $academicCycle;
	}
	public function getAcademicCycle() {
		return $this->academicCycle;
	}
	public function setCoordinator(Professor $coordinator) {
		$this->coordinator = $coordinator;
	}
	public function getCoordinator() {
		return $this->coordinator;
	}
}
<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\Schedule;
use FisiLog\BusinessClasses\ClassRoom;
use FisiLog\BusinessClasses\Professor;
use FisiLog\BusinessClasses\Group;
class Clase {
	private $schedule;
	private $classroom;
	private $professor;
	private $group;
	private $type;
	private $status;

	public function setSchedule(Schedule $schedule) {
		$this->schedule = $schedule;
	}
	public function getSchedule($schedule) {
		return $this->schedule;
	}
	public function setClassRoom(ClassRoom $classroom) {
		$this->classroom = $classroom;
	}
	public function getClassRoom() {
		return $this->classroom;
	}
	public function setProfessor(Professor $professor) {
		$this->professor = $professor;
	}
	public function getProfessor() {
		return $this->professor;
	}
	public function setGroup(Group $group) {
		$this->group = $group;
	}
	public function getGroup() {
		return $this->group;
	}
	public function setType($type) {
		$this->type = $type;
	}
	public function getType() {
		return $this->type;
	}
	public function setStatus($status) {
		$this->status = $status;
	}
	public function getStatus() {
		return $this->status;
	}
}
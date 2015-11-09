<?php
namespace FisiLog\BusinessClasses;
class Schedule {
	private $startHour;
	private $endHour;
	private $dateOfTheWeek;

	public function setStartHour($startHour) {
		$this->startHour = $startHour;
	}
	public function getStartHour() {
		return $this->startHour;
	}
	public function setEndHour($endHour) {
		$this->endHour = $endHour;
	}
	public function getEndHour() {
		return $this->endHour;
	}
	public function setDayOfTheWeek($dayOfTheWeek) {
		$this->dayOfTheWeek = $dayOfTheWeek;
	}
	public function getDayOfTheWeek() {
		return $this->dayOfTheWeek;
	}
}
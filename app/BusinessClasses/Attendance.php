<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\Clase;
class Attendace {
	private $clase;
	private $user;
	private $date;

	public function setUser(User $user) {
		$this->user = $user;
	}
	public function getUser() {
		return $this->user;
	}
	public function setClass(Clase $clase) {
		$this->clase = $clase;
	}
	public function getClass() {
		return $this->clase;
	}
	public function setDate($date) {
		$this->date = $date;
	}
	public function getDate() {
		return $this->date;
	}
}
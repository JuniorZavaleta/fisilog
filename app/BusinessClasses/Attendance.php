<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\User;
use FisiLog\BusinessClasses\Clase;
class Attendace {
	private $id;
	private $clase;
	private $user;
	private $date;

	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setUser(User $user) {
		$this->user = $user;
	}
	public function getUser() {
		return $this->user;
	}
	public function setClase(Clase $clase) {
		$this->clase = $clase;
	}
	public function getClase() {
		return $this->clase;
	}
	public function setDate($date) {
		$this->date = $date;
	}
	public function getDate() {
		return $this->date;
	}
}
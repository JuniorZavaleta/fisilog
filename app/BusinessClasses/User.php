<?php
namespace FisiLog\BusinessClasses;
use Hash;
class User {
	protected $name;
	protected $lastname;
	protected $email;
	protected $phone;
	protected $password;

	public function setName($name) {
		$this->name = $name;
	}
	public function getName() {
		return $this->name;
	}
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}
	public function getLastname() {
		return $this->lastname;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setPhone($phone) {
		$this->phone = $phone;
	}
	public function getPhone() {
		return $this->phone;
	}
	public function setPassword($password) {
		$this->password = Hash::make($password);
	}
	public function getPassword() {
		return $this->password;
	}
}
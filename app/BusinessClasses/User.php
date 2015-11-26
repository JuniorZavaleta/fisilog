<?php
namespace FisiLog\BusinessClasses;
use Hash;
class User {
	protected $id;
	protected $name;
	protected $lastname;
	protected $email;
	protected $phone;
	protected $password;
	protected $type;
	protected $photo_url;
	protected $notification_channel;

	public function setId($id) {
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setType($type) {
		$this->type = $type;
	}
	public function getType() {
		return $this->type;
	}
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
	public function setPhotoUrl($photo_url) {
		$this->photo_url = $photo_url;
	}
	public function getPhotoUrl() {
		return $this->photo_url;
	}
	public function setNotificationChannel(NotificationChannel $notification_channel) {
		$this->notification_channel = $notification_channel;
	}
	public function getNotificationChannel() {
		return $this->notification_channel;
	}
}
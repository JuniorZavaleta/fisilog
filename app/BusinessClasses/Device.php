<?php
namespace FisiLog\BusinessClasses;
use FisiLog\BusinessClasses\Professor;
class Device {
	private $professor;
	private $brand; //Marca del dispositivo
	private $model; //Modelo del dispositivo
	private $serialNumber; //Numero de Serie

	public function setProfessor(Professor $professor){
		$this->professor = $professor;
	}

	public function getProfessor(){
		return $this->professor;
	}

	public function setBrand($brand){
		$this->brand = $brand;
	}

	public function getBrand(){
		return $this->marca;
	}

	public function setModel($model){
		$this->model = $model;
	}

	public function getModel(){
		return $this->model;
	}

	public function setSerialNumber($serialNumber){
		$this->serialNumber = $serialNumber;
	}

	public function getSerialNumber(){
		return $this->serialNumber;
	}
}
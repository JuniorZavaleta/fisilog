<?php
namespace FisiLog\BusinessClasses;
class AcademicDepartment {
  private $name;
  private $id;

  public function setId($id) {
    $this->id = $id;
  }
  public function getId() {
    return $this->id;
  }
  public function setName($name) {
    $this->name = $name;
  }
  public function getName() {
    return $this->name;
  }
}
<?php
namespace FisiLog\DAO\Professor;
use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
interface ProfessorDao {
	public function findById($id);
	public function save(ProfessorBusiness $professorBusiness);
}
<?php
namespace FisiLog\DAO\Professor;
use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
interface ProfessorDao {
	public function save(ProfessorBusiness $professorBusiness);
}
<?php
namespace FisiLog\DAO;
use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
interface ClaseDao {
	public function getByProfessor(ProfessorBusiness $professor);
}
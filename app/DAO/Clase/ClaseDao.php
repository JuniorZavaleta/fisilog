<?php
namespace FisiLog\DAO\Clase;
use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
interface ClaseDao {
	public function getByProfessor(ProfessorBusiness $professor, $relations = null);
}
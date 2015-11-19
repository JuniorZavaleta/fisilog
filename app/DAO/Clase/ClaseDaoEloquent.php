<?php
namespace FisiLog\DAO;
use FisiLog\DAO\ClaseDao;
use FisiLog\BusinessClasses\Clase as ClaseBusiness;
use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
use FisiLog\Models\Clase as ClaseModel;

class ClaseDaoEloquent implements ClaseDao {
	public function getByProfessor(ProfessorBusiness $professorBusiness) {

	}
}
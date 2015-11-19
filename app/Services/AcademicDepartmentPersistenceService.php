<?php
namespace FisiLog\Services;
use FisiLog\Dao\DaoEloquentFactory;

class AcademicDepartmentPersistenceService {
	public function __construct(DaoEloquentFactory $dao) {
		$this->academicDepartmentPersistence = $dao->getAcademicDepartmentDAO();
	}
	public function all() {
		return $this->academicDepartmentPersistence->getAll();
	}
}
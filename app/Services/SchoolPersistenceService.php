<?php
namespace FisiLog\Services;
use FisiLog\Dao\DaoEloquentFactory;

class SchoolPersistenceService {
	public function __construct(DaoEloquentFactory $dao) {
		$this->schoolPersistence = $dao->getSchoolDAO();
	}
	public function all() {
		return $this->schoolPersistence->getAll();
	}
}
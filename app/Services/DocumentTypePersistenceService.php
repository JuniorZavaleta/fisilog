<?php
namespace FisiLog\Services;
use FisiLog\Dao\DaoEloquentFactory;

class DocumentTypePersistenceService {
	public function __construct(DaoEloquentFactory $dao) {
		$this->documentTypePersistence = $dao->getDocumentTypeDAO();
	}
	public function all() {
		return $this->documentTypePersistence->getAll();
	}
}
<?php
namespace FisiLog\Services;
use FisiLog\Dao\DaoEloquentFactory;

class ClasePersistenceService {
  public function __construct(DaoEloquentFactory $dao) {
    $this->classPersistence = $dao->getClaseDAO();
    $this->professorPersistence = $dao->getProfessorDAO();
  }
  public function getByProfessor($professor_id) {
    $professor_business = $this->professorPersistence->findById($professor_id);

    return $this->classPersistence->getByProfessor($professor_business, null);
  }
}
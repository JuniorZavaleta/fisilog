<?php
namespace FisiLog\DAO\Document;
use FisiLog\BusinessClasses\Document as DocumentBusiness;
interface DocumentDao {
	public function save(DocumentBusiness $documentBusiness);
}
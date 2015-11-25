<?php
namespace FisiLog\DAO\Group;
use FisiLog\BusinessClasses\Student as StudentBusiness;
use FisiLog\BusinessClasses\Group as GroupBusiness;

interface GroupDao {
	public function findByStudent(StudentBusiness $studentBusiness);
}
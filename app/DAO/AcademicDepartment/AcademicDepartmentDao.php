<?php
namespace FisiLog\DAO\AcademicDepartment;
use FisiLog\BusinessClasses\AcademicDepartment as AcademicDepartmentBusiness;
interface AcademicDepartmentDao {
	public function findById($id);
	public function getAll();
}
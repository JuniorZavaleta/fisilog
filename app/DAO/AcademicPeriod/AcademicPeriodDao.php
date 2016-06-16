<?php
namespace FisiLog\DAO\AcademicPeriod;

use FisiLog\BusinessClasses\AcademicPeriod as AcademicPeriodBusiness;

interface AcademicPeriodDao {
   public function save(AcademicPeriod $academic_period);
   public function findById($id);
   public function getAll();
   public function getByFacultyId($facultad_id);
}
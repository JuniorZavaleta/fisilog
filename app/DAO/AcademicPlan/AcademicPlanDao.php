<?php
namespace FisiLog\DAO\AcademicPlan;

use FisiLog\BusinessClasses\AcademicPlan;

interface AcademicPlanDao {
   public function save(AcademicPlan &$academic_plan);
   public function findById($id);
   public function getAll();
   public function update(AcademicPlan $facultad);
   public function getBySchoolId($school_id);
}
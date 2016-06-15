<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;

use FisiLog\Dao\DaoEloquentFactory;

use FisiLog\Models\Course;

class CourseController extends Controller
{

   public function __construct(DaoEloquentFactory $dao)
   {
      $this->course_persistence = $dao->getCourseDAO();
      $this->eap_persistence = $dao->getSchoolDAO();
      $this->academic_plan_persistence = $dao->getAcademicPlanDAO();
   }

   public function index($eap, $academic_plan)
   {
      $eap = $this->eap_persistence->createBusinessClass($eap);
      $academic_plan = $this->academic_plan_persistence->createBusinessClass($academic_plan);
      $courses = $this->course_persistence->getByAcademicPlanId($academic_plan->getId());

      $data = [
         'eap' => $eap,
         'academic_plan' => $academic_plan,
         'courses' => $courses,
      ];

      return view('backend.eaps.academic_plans.courses.index', $data);
   }

}

<?php

namespace FisiLog\Http\Controllers\Backend;

use Illuminate\Http\Request;

use FisiLog\Http\Requests;
use FisiLog\Http\Controllers\Controller;

use FisiLog\Models\Course;

class CourseController extends Controller
{
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

   public function getByEap($eap, $ciclo)
   {
      $eap = $this->eap_persistence->createBusinessClass($eap);
      $courses = $this->course_persistence->getByEapIdAndCiclo($eap->getId(), $ciclo);

      $output = [];

      foreach ($courses as $course) {
         $output[] = [
            'id' => $course->getId(),
            'name' => $course->getName(),
            'academic_plan' => $course->getAcademicPlanName(),
         ];
      }

      return response()->json($output);
   }

}

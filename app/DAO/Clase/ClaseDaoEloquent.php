<?php
namespace FisiLog\DAO\Clase;
use FisiLog\BusinessClasses\Clase as ClaseBusiness;
use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
use FisiLog\BusinessClasses\ClassRoom as ClassRoomBusiness;
use FisiLog\BusinessClasses\Schedule as ScheduleBusiness;
use FisiLog\BusinessClasses\Group as GroupBusiness;
use FisiLog\BusinessClasses\CourseOpened as CourseOpenedBusiness;
use FisiLog\BusinessClasses\Course as CourseBusiness;
use FisiLog\Models\Clase as ClaseModel;


class ClaseDaoEloquent implements ClaseDao {
  private function createClassRoom($clase) {
    $classroom = new ClassRoomBusiness;
    $classroom->setId($clase->classroom->id);
    $classroom->setName($clase->classroom->name);

    return $classroom;
  }
  private function createSchedule($clase) {
    $schedule = new ScheduleBusiness;
    $schedule->setStartHour($clase->schedule->start_hour);
    $schedule->setEndHour($clase->schedule->end_hour);
    $schedule->setDayOfTheWeek($clase->schedule->day_of_the_week);

    return $schedule;
  }
  private function createGroup($clase) {
    $groupModel = $clase->group;
    $group = new GroupBusiness;
    $group->setId($groupModel->id);
    $group->setNumberOfGroup($groupModel->number_of_group);

    $courseOpenedModel = $groupModel->courseOpened;
    $courseModel = $courseOpenedModel->course;

    $course = new CourseBusiness;
    $course->setId($courseModel->id);
    $course->setName($courseModel->name);
    $course->setCode($courseModel->code);
    $course->setQuantityOfCredits($courseModel->quantity_of_credits);

    $courseOpened = new CourseOpenedBusiness;
    $courseOpened->setCourse($course);
    $group->setCourseOpened($courseOpened);

    return $group;
  }
  private function createProfessor($clase) {
    $professorModel = $clase->professor;
    $professorBusiness = new ProfessorBusiness;
    $professorBusiness->setId($professorModel->id);
    $professorBusiness->setProfessorType($professorModel->type);

    return $professorBusiness;
  }
  public function getByProfessor(ProfessorBusiness $professorBusiness, $relations = null) {
    if ($relations == null)
      $relations = ['classroom','schedule','group'];
    $claseModel = ClaseModel::where('professor_id', '=', $professorBusiness->getId())
                            ->with($relations)
                            ->get();
    $claseBusiness = [];

    foreach ($claseModel as $clase) {
      if (in_array("classroom", $relations)) {
        $classroom = $this->createClassRoom($clase);
      } else {
        $classroom = null;
      }

      if (in_array("schedule", $relations)) {
        $schedule = $this->createSchedule($clase);
      } else {
        $schedule = null;
      }

      if (in_array("group", $relations)) {
        $group = $this->createGroup($clase);
      } else {
        $group = null;
      }

      $newClaseBusiness = new ClaseBusiness;
      $newClaseBusiness->setId($clase->id);
      $newClaseBusiness->setClassRoom($classroom);
      $newClaseBusiness->setSchedule($schedule);
      $newClaseBusiness->setGroup($group);
      $newClaseBusiness->setProfessor($professorBusiness);
      $claseBusiness[] = $newClaseBusiness;
    }

    return $claseBusiness;
  }

  public function findById($id, $relations = null) {
    $claseModel = ClaseModel::find($id);
    if ($relations == null)
      $relations = ['classroom','schedule','group','professor'];
    if (in_array("classroom", $relations)) {
      $classroom = $this->createClassRoom($claseModel);
    } else {
      $classroom = null;
    }

    if (in_array("schedule", $relations)) {
      $schedule = $this->createSchedule($claseModel);
    } else {
      $schedule = null;
    }

    if (in_array("group", $relations)) {
      $group = $this->createGroup($claseModel);
    } else {
      $group = null;
    }

    if (in_array("professor", $relations)) {
      $professor = $this->createProfessor($claseModel);
    } else {
      $professor = null;
    }

    $claseBusiness = new ClaseBusiness;
    $claseBusiness->setId($claseModel->id);
    $claseBusiness->setClassRoom($classroom);
    $claseBusiness->setSchedule($schedule);
    $claseBusiness->setGroup($group);
    $claseBusiness->setProfessor($professor);

    return $claseBusiness;
  }
}
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
  public function getByProfessor(ProfessorBusiness $professorBusiness, $relations = null) {
    if ($relations == null)
      $relations = ['classroom','schedule','group'];
    $claseModel = ClaseModel::where('professor_id', '=', $professorBusiness->getId())
                            ->with($relations)
                            ->get();
    $claseBusiness = [];

    foreach ($claseModel as $clase) {
      if (in_array("classroom", $relations)) {
        $classroom = new ClassRoomBusiness;
        $classroom->setId($clase->classroom->id);
        $classroom->setName($clase->classroom->name);
      } else {
        $classroom = null;
      }

      if (in_array("schedule", $relations)) {
        $schedule = new ScheduleBusiness;
        $schedule->setStartHour($clase->schedule->start_hour);
        $schedule->setEndHour($clase->schedule->end_hour);
        $schedule->setDayOfTheWeek($clase->schedule->day_of_the_week);
      } else {
        $schedule = null;
      }

      if (in_array("group", $relations)) {
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
}
<?php
namespace FisiLog\DAO;
use FisiLog\DAO\ClaseDao;
use FisiLog\BusinessClasses\Clase as ClaseBusiness;
use FisiLog\BusinessClasses\Professor as ProfessorBusiness;
use FisiLog\BusinessClasses\ClassRoom as ClassRoomBusiness;
use FisiLog\BusinessClasses\Schedule as ScheduleBusiness;
use FisiLog\BusinessClasses\Group as GroupBusiness;
use FisiLog\Models\Clase as ClaseModel;


class ClaseDaoEloquent implements ClaseDao {
  public function getByProfessor(ProfessorBusiness $professorBusiness, $relations) {
    if ($relations == null)
      $relations = ['classroom','schedule','group'];
    $claseModel = ClaseModel::where('professor_id', '=', $professorBusiness->getId())
                            ->with($relations)
                            ->get();
    $claseBusiness = [];
    foreach ($claseModel as $clase) {
      if ($relations['classroom']) {
        $classroom = new ClassRoomBusiness;
        $classroom->setId($clase->classroom->id);
        $claseroom->setName($clase->classroom->name);
      } else {
        $classroom = null;
      }

      if ($relations['schedule']) {
        $schedule = new ScheduleBusiness;
        $schedule->setStartHour($clase->schedule->start_hour);
        $schedule->setEndHour($clase->schedule->end_hour);
        $schedule->setDayOfTheWeek($clase->schedule->day_of_the_week);
      } else {
        $schedule = null;
      }

      if ($relations['group']) {
        $group = new GroupBusiness;
        $group->setNumberOfGroup($clase->group->number_of_group);
      } else {
        $group = null;
      }

      $newClaseBusiness = new ClaseBusiness;
      $newClaseBusiness->setId($clase->id);
      $newClaseBusiness->setClassRoom($classroom);
      $newClaseBusiness->setSchedule($schedule);
      $newClaseBusiness->setGroup($group);

      $claseBusiness[] = $newClaseBusiness;
    }

    return $claseBusiness;
  }
}
<?php
namespace FisiLog\DAO\Group;
use FisiLog\BusinessClasses\Student as StudentBusiness;
use FisiLog\BusinessClasses\Group as GroupBusiness;
use FisiLog\BusinessClasses\Clase as ClaseBusiness;
use FisiLog\Models\Group as GroupModel;

class GroupDaoEloquent implements GroupDao {
  public function findByStudent(StudentBusiness $studentBusiness) {
    $groups = GroupModel::whereHas('students', function($query) use($studentBusiness) {
      $query->where('student_id', '=', $studentBusiness->getId());
    })->get();

    $groupBusiness = [];
    foreach ($groups as $group) {
      $newGroup = new GroupBusiness;
      $newGroup->setId( $group->id );
      $newGroup->setNumberOfGroup( $group->number_of_group );

      foreach ($group->clases as $clase) {
        $newClase = new ClaseBusiness;
        $newClase->setId( $clase->id );
        $newClase->setType( $clase->type );
        $newGroup->addClase( $newClase );
      }
      $groupBusiness[] = $newGroup;
    }

    return $groupBusiness;
  }
}
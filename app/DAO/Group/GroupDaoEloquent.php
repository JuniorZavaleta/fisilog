<?php
namespace FisiLog\DAO\Group;
use FisiLog\BusinessClasses\Student as StudentBusiness;
use FisiLog\BusinessClasses\Group as GroupBusiness;
use FisiLog\BusinessClasses\Clase as ClaseBusiness;
use FisiLog\Models\Group as GroupModel;

class GroupDaoEloquent implements GroupDao {

   public static function createBusinessClass(GroupModel $group_model)
   {
      if ($group_model == null)
         return null;

      $group_business = new GroupBusiness(
         $group_model->number_of_group
      );

      return $group_business;
   }
}
<?php
namespace FisiLog\DAO\UserType;

use FisiLog\BusinessClasses\UserType as UserTypeBusiness;

use FisiLog\Models\UserType as UserTypeModel;

class UserTypeDaoEloquent implements UserTypeDao {

   public function getAll()
   {
      $user_types_model = UserTypeModel::all();
      $user_types = [];

      foreach ($user_types_model as $user_type_model) {
         $user_types[] = static::createBusinessClass($user_type_model);
      }

      unset($user_types_model);

      return $user_types;
   }

   public function save(UserTypeBusiness $userType)
   {
      $userTypeModel = UserTypeModel::create($userType->toArray());

      return $userTypeModel->id;
   }

   public function findById($id)
   {
      $userTypeModel = UserTypeModel::find($id);

      return static::createBusinessClass($userTypeModel);
   }

   public static function createBusinessClass(UserTypeModel $userTypeModel)
   {
      if ($userTypeModel == null)
         return null;

      $userType = new UserTypeBusiness(
         $userTypeModel->id,
         $userTypeModel->name
      );

      return $userType;
   }
}
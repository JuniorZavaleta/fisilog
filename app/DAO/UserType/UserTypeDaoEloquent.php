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

   public function save(UserTypeBusiness $user_type)
   {
      $user_type_model = UserTypeModel::create($user_type->toArray());

      return $user_type_model->id;
   }

   public function findById($id)
   {
      $user_type_model = UserTypeModel::find($id);

      return static::createBusinessClass($user_type_model);
   }

   public static function createBusinessClass(UserTypeModel $user_type_model)
   {
      if ($user_type_model == null)
         return null;

      $user_type = new UserTypeBusiness(
         $user_type_model->id,
         $user_type_model->name
      );

      return $user_type;
   }
}
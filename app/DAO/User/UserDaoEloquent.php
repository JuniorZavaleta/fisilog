<?php
namespace FisiLog\DAO\User;

use FisiLog\BusinessClasses\User as UserBusiness;
use FisiLog\Models\User as UserModel;

use FisiLog\DAO\NotificationChannel\NotificationChannelDaoEloquent as NotificationChannelModel;
use FisiLog\DAO\UserType\UserTypeDaoEloquent as UserTypeModel;

class UserDaoEloquent implements UserDao {

   public function save(UserBusiness &$user_business)
   {
      $user_model = UserModel::create($user_business->toArray());
      $user_business->setId($user_model->id);
   }

   public function paginate($per_page = 10, $page = 1)
   {
      $users_model = UserModel::paginate($per_page);

      $users_business = [];

      foreach ($users_model as $user_model)
         $users_business[] = static::createBusinessClass($user_model);

      return $users_business;
   }

   public function findById($id)
   {
      $user_model = UserModel::find($id);

      return static::createBusinessClass($user_model);
   }

   public function findByEmail($email)
   {
      $user_model = UserModel::where('email','=',$email)->first();

      return static::createBusinessClass($user_model);;
   }

   public function findByDocument($document_code)
   {
      $user_model = UserModel::whereHas('documents', function($query) use ($document_code){
         $query->where('code','=', $document_code);
      })->first();

      return static::createBusinessClass($user_model);;
   }

   public static function createBusinessClass(UserModel $user_model)
   {
      if ($user_model == null)
         return null;

      $user_business = new UserBusiness(
         $user_model->name,
         $user_model->lastname,
         $user_model->email,
         $user_model->password,
         $user_model->phone,
         UserTypeModel::createBusinessClass($user_model->user_type),
         $user_model->photo_url,
         NotificationChannelModel::createBusinessClass($user_model->notification_channel),
         $user_model->id
      );

      return $user_business;
   }

}
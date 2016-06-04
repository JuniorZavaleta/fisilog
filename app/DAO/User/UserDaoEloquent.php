<?php
namespace FisiLog\DAO\User;

use FisiLog\BusinessClasses\User as UserBusiness;

use FisiLog\Models\User as UserModel;

use FisiLog\DAO\NotificationChannel\NotificationChannelDaoEloquent as NotificationChannelModel;
use FisiLog\DAO\UserType\UserTypeDaoEloquent as UserTypeModel;

use Image;
use URL;

class UserDaoEloquent implements UserDao {

   public function save(UserBusiness $userBusiness)
   {
      $userModel = UserModel::create($userBusiness->toArray());

      return $userModel->id;
   }

   public function findById($id)
   {
      $userModel = UserModel::find($id);

      return $this->createUser($userModel);
   }

   public function findByEmail($email)
   {
      $userModel = UserModel::where('email','=',$email)->first();

      return $this->createUser($userModel);;
   }

   public function findByDocument($document_code)
   {
      $userModel = UserModel::whereHas('documents', function($query) use ($document_code){
         $query->where('code','=', $document_code);
      })->first();

      return $this->createUser($userModel);;
   }

   private function createUser(UserModel $userModel)
   {
      if ($userModel == null)
         return null;

      $userBusiness = new UserBusiness(
         $userModel->name,
         $userModel->lastname,
         $userModel->email,
         $userModel->password,
         $userModel->phone,
         UserTypeModel::createBusinessClass($userModel->user_type),
         $userModel->photo_url,
         NotificationChannelModel::createBusinessClass($userModel->notification_channel)
      );

      return $userBusiness;
   }

}
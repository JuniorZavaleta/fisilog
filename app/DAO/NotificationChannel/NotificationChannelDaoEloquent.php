<?php
namespace FisiLog\DAO\NotificationChannel;

use FisiLog\BusinessClasses\NotificationChannel as NotificationChannelBusiness;

use FisiLog\Models\NotificationChannel as NotificationChannelModel;

class NotificationChannelDaoEloquent implements NotificationChannelDao {

   public function save(NotificationChannelBusiness $notificationChannel)
   {
      $notificationChannelModel = NotificationChannelModel::create($notificationChannel->toArray());

      return $notificationChannelModel->id;
   }

   public function findById($id)
   {
      $notificationChannelModel = NotificationChannelModel::find($id);

      return static::createBusinessClass($notificationChannelModel);
   }

   public static function createBusinessClass(NotificationChannelModel $notificationChannelModel)
   {
      if ($notificationChannelModel == null)
         return null;

      $notificationChannel = new NotificationChannelBusiness(
         $notificationChannelModel->name,
         $notificationChannelModel->id
      );

      return $notificationChannel;
   }

}
<?php
namespace FisiLog\DAO\NotificationChannel;

use FisiLog\BusinessClasses\NotificationChannel as NotificationChannelBusiness;

use FisiLog\Models\NotificationChannel as NotificationChannelModel;

class NotificationChannelDaoEloquent implements NotificationChannelDao {

   public function save(NotificationChannelBusiness $notification_channel_business)
   {
      $notification_channel_model = NotificationChannelModel::create($notification_channel_business->toArray());

      return $notification_channel_model->id;
   }

   public function findById($id)
   {
      $notification_channel_model = NotificationChannelModel::find($id);

      return static::createBusinessClass($notification_channel_model);
   }

   public static function createBusinessClass(NotificationChannelModel $notification_channel_model)
   {
      if ($notification_channel_model == null)
         return null;

      $notification_channel_business = new NotificationChannelBusiness(
         $notification_channel_model->name,
         $notification_channel_model->id
      );

      return $notification_channel_business;
   }

}
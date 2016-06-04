<?php
namespace FisiLog\DAO\NotificationChannel;

use FisiLog\BusinessClasses\NotificationChannel as NotificationChannelBusiness;

interface NotificationChannelDao {
   public function save(NotificationChannelBusiness $notificationChannel);
   public function findById($id);
}
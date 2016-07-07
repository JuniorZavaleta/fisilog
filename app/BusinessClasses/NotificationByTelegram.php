<?php
namespace FisiLog\BusinessClasses;

use FisiLog\BusinessClasses\Notificator;

use Telegram\Bot\Api as TelegramApi;

class NotificationByTelegram implements Notificator {

   public function __construct()
   {
      $this->telegram = new TelegramApi();
   }

   public function notify($view, $data, $subject, $to)
   {
      $view = 'notifications.telegram_messages.'.$view;
      $message = '<b>'.$subject."</b>\n".view($view, $data);

      $this->telegram->sendMessage([
         'chat_id' => $to,//$to
         'text' => $message,
         'parse_mode' => 'HTML',
      ]);
   }

}
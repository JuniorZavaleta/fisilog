<?php

namespace FisiLog\Services;

use Telegram\Bot\Api as TelegramApi;

class TelegramNotificator implements Notificator
{
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

<?php

namespace FisiLog\Services;

use FisiLog\Models\NotificationChannel;

class NotificationService
{
    public function notify($view, $data, $subject, $user)
    {
        $notificator = $this->getNotificator($user);

        if (is_null($notificator)) {
            // Error message or something
        }

        $notificator->notify($view, $data, $subject, $user->notification_receipt);
    }

    private function getNotificator($user)
    {
        switch ($user->notification_channel_id) {
            case NotificationChannel::SMS_CHANNEL:
                return null;
            case NotificationChannel::TELEGRAM_CHANNEL:
                return new TelegramNotificator;
            case NotificationChannel::EMAIl_CHANNEL:
                return new EmailNotificator;
            default:
                return null;
        }
    }
}
<?php
namespace FisiLog\Services;

interface Notificator {
    public function notify($message, $subject, $to);
}